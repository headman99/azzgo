<?php

namespace App\Http\Controllers;

use App\Enums\ContactTypeEnum;
use App\Enums\CustomNotificationTypeEnum;
use App\Enums\FeedbackTypesEnum;
use App\Enums\NotificationActionTypeEnum;
use App\Enums\RequestStatusEnum;
use App\Enums\RequestTypeEnum;
use App\Enums\UserMarkTypeEnum;
use App\Http\Resources\ContactTypeResource;
use App\Http\Resources\CustomerCompleteResource;
use App\Http\Resources\ErrorResource;
use App\Http\Resources\FavouriteProductPaginateResource;
use App\Http\Resources\FeedbackPaginatedResource;
use App\Http\Resources\CustomNotificationActionPaginatedResource;
use App\Http\Resources\FollowStoreSmallPaginateResource;
use App\Http\Resources\ProductPaginatedResource;
use App\Http\Resources\ProductResource;
use App\Http\Resources\RequestHistoryConsumerPaginateResource;
use App\Http\Resources\RequestHistoryConsumerPublisherPaginateResource;
use App\Http\Resources\RequestProductPaginateResource;
use App\Http\Resources\RequestPublisherPaginateResource;
use App\Http\Resources\RequestReverseProductFromOfferPaginateResource;
use App\Http\Resources\SearchProductPaginateResource;
use App\Http\Resources\StoreResource;
use App\Http\Resources\StoreSmallResource;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\ThunderDealPaginatedResource;
use App\Jobs\CreateNotificationProcess;
use App\Models\Contact;
use App\Models\ContactType;
use App\Models\CustomNotification;
use App\Models\Favourite;
use App\Models\Feedback;
use App\Models\Follow;
use App\Models\Mark;
use App\Models\NotificationAction;
use App\Models\Product;
use App\Models\RequestAds;
use App\Models\RequestHistory;
use App\Models\Store;
use App\Models\ThunderDeal;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function getProfile()
    {
        try {
            $user = Auth::user();
            return response(['user' => new CustomerCompleteResource($user)]);
        } catch (\Exception $exc) {
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function getPublisherProfile($id)
    {
        try {
            $store = Store::find($id);
            if (empty($store)) {
                return response(null, \Illuminate\Http\Response::HTTP_NO_CONTENT);
            }
            return response(['store' => new StoreResource($store)]);
        } catch (\Exception $exc) {
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function addItemToRequest(Request $request)
    {
        $validatedData = $request->validate([
            'productid' => 'required',
        ]);
        try {
            DB::beginTransaction();
            $userid = Auth::user()->id;
            $product = Product::find($request->input('productid'));

            $check = RequestAds::where('userid', $userid)->where('publisherid', $product->store->id)->first();

            if (!empty($check)) {
                $groupcode = $check->groupcode;
            } else {
                $groupcode = Str::uuid()->toString();
            }

            $req = array_merge($validatedData, [
                'userid' => $userid,
                'status' => RequestStatusEnum::PENDING,
                'productid' => $product->id,
                'publisherid' => $product->store->id,
                'quantity' => 1,
                'price' => 0.00,
                'groupcode' => $groupcode
            ]);
            $savedrequest = RequestAds::create($req);

            DB::commit();
            return response(new SuccessResource(null));
        } catch (\Exception $exc) {
            DB::rollback();
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function deleteItemFromRequest(Request $request)
    {
        $validatedData = $request->validate([
            'productid' => 'required',
            'requestcode' => 'required',
        ]);
        try {
            DB::beginTransaction();
            $userid = Auth::user()->id;
            $req = RequestAds::where('userid', $userid)
                ->where('productid', $request->input('productid'))
                ->where('requestcode', $request->input('requestcode'))->first();
            if (!empty($req)) {
                $req->delete();
                DB::commit();
                return response(new SuccessResource(null));
            } else {
                return response(null, \Illuminate\Http\Response::HTTP_NOT_MODIFIED);
            }
        } catch (\Exception $exc) {
            DB::rollback();
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function getRequest($stato)
    {
        try {
            $userid = Auth::user()->id;
            $reqs = RequestAds::selectRaw('publisherid, groupcode, COUNT(productid) AS productcount')->where('userid', $userid)->where('status', $stato)->distinct()->groupBy('publisherid', 'groupcode')->paginate(20);
            if (empty($reqs)) {
                return response(null, \Illuminate\Http\Response::HTTP_NO_CONTENT);
            }
            return response(new RequestPublisherPaginateResource($reqs));
        } catch (\Exception $exc) {
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function getRequestDetail($publisherid, $status)
    {
        try {
            $userid = Auth::user()->id;
            $reqs = RequestAds::where('userid', $userid)
                ->where('publisherid', $publisherid)
                ->where('status', $status)
                ->paginate(20);
            if (empty($reqs)) {
                return response(null, \Illuminate\Http\Response::HTTP_NO_CONTENT);
            }
            return response(['requests' => new RequestProductPaginateResource($reqs)]);
        } catch (\Exception $exc) {
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function getContactTypes()
    {
        try {
            $types = ContactType::all();
            return response(['contactypes' => ContactTypeResource::collection($types)]);
        } catch (\Exception $exc) {
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function addContact(Request $request)
    {
        $validatedData = $request->validate([
            'typecode' => 'required',
            'value' => 'required',
        ]);
        try {
            DB::beginTransaction();
            $userid = Auth::user()->id;
            Contact::create([
                'iduser' => $userid,
                'typecode' => $request->input('typecode'),
                'value' => $request->input('value')
            ]);
            DB::commit();
            return response(new SuccessResource(null));
        } catch (\Exception $exc) {
            DB::rollBack();
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function editContact(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required',
            'value' => 'required',
        ]);
        try {
            DB::beginTransaction();
            $contact = Contact::find($request->input('id'));
            $contact->value = $request->input('value');
            $contact->save();
            DB::commit();
            return response(new SuccessResource(null));
        } catch (\Exception $exc) {
            DB::rollBack();
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function getProductsByPublisher($publisherid)
    {
        try {
            $products = Product::where('storeid', $publisherid)->orderBy('updated_at', 'DESC')->paginate(10);
            if (empty($products)) {
                return response(null, \Illuminate\Http\Response::HTTP_NO_CONTENT);
            }
            return response(['products' => new ProductPaginatedResource($products)]);
        } catch (\Exception $exc) {
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function sendRequestToPublisher(Request $request)
    {
        $validatedData = $request->validate([
            'publisherid' => 'required',
        ]);
        try {
            DB::beginTransaction();
            $userid = Auth::user()->id;
            $publisheruserid = Store::find($request->input('publisherid'));
            $reqs = RequestAds::where('publisherid', $request->input('publisherid'))
                ->where('userid', $userid)
                ->where('status', RequestStatusEnum::PENDING)
                ->get();
            if (!empty($reqs)) {
                foreach ($reqs as $req) {
                    $req->status = RequestStatusEnum::SENDTOPUBLISHER;
                    $req->save();
                    $data = [
                        'title' => 'E\' arrivata una nuova richiesta',
                        'description' => 'Vai alle tue richiesta',
                        'userid' => $publisheruserid->iduser,
                        'action' => CustomNotificationTypeEnum::REQUEST_ARRIVED,
                        'type' => NotificationActionTypeEnum::GOTO_REQUEST
                    ];
                    CreateNotificationProcess::dispatch($data);
                }
                DB::commit();
            }
            return response(new SuccessResource(null));
        } catch (\Exception $exc) {
            DB::rollBack();
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function getRequestSent()
    {
        try {
            $id = Auth::user()->id;
            $reqs = RequestAds::where('userid', $id)
                ->whereIn('status', [RequestStatusEnum::SENDTOPUBLISHER, RequestStatusEnum::ACCEPTED, RequestStatusEnum::DENIED])
                ->orderby('updated_at', 'DESC')
                ->paginate(10);
            if (count($reqs) == 0) {
                return response(null, \Illuminate\Http\Response::HTTP_NO_CONTENT);
            }
            return response(['requests' => new RequestProductPaginateResource($reqs)]);
        } catch (\Exception $exc) {
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function getRequestPending()
    {
        try {
            $id = Auth::user()->id;
            $reqs = RequestAds::where('userid', $id)
                ->whereIn('status', [RequestStatusEnum::PENDING])
                ->orderby('updated_at', 'DESC')
                ->paginate(10);
            if (count($reqs) == 0) {
                return response(null, \Illuminate\Http\Response::HTTP_NO_CONTENT);
            }
            return response(['requests' => new RequestProductPaginateResource($reqs)]);
        } catch (\Exception $exc) {
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function getRequestCountPending()
    {
        try {
            $id = Auth::user()->id;
            $reqs = RequestAds::where('userid', $id)
                ->whereIn('status', [RequestStatusEnum::PENDING])
                ->count();
            return response(['countreqs' => $reqs]);
        } catch (\Exception $exc) {
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function getRequestsHistory()
    {
        try {
            $userid = Auth::user()->id;
            $reqs = RequestHistory::selectRaw('status, closed_at, groupcode, publisherid, COUNT(productid) AS productcount')->where('userid', $userid)->distinct()->groupBy(['publisherid', 'groupcode', 'closed_at', 'status'])->orderBy('closed_at', 'DESC')->paginate(20);
            if (empty($reqs)) {
                return response(null, \Illuminate\Http\Response::HTTP_NO_CONTENT);
            }
            return response(new RequestHistoryConsumerPublisherPaginateResource($reqs));
        } catch (\Exception $exc) {
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function getRequestDetailsHistory($groupcode)
    {
        try {
            $userid = Auth::user()->id;
            $reqs = RequestHistory::where('userid', $userid)
                ->where('groupcode', $groupcode)
                ->paginate(20);
            if (empty($reqs)) {
                return response(null, \Illuminate\Http\Response::HTTP_NO_CONTENT);
            }
            return response(['requests' => new RequestProductPaginateResource($reqs)]);
        } catch (\Exception $exc) {
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function getProductFeedback($productid)
    {
        try {
            $mediafeedbacks = Feedback::where('reviewed', $productid)->where('reviewedtype', FeedbackTypesEnum::PRODUCT)->avg('value');
            if (empty($mediafeedbacks)) {
                return response(null, \Illuminate\Http\Response::HTTP_NO_CONTENT);
            }
            return response(['media' => $mediafeedbacks]);
        } catch (\Exception $exc) {
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function getProductFeedbackList($productid)
    {
        try {
            $feedbacks = Feedback::where('reviewed', $productid)->where('reviewedtype', FeedbackTypesEnum::PRODUCT)->paginate(20);
            if (empty($feedbacks)) {
                return response(null, \Illuminate\Http\Response::HTTP_NO_CONTENT);
            }
            return response(new FeedbackPaginatedResource($feedbacks));
        } catch (\Exception $exc) {
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function getPublisherFeedback($storeid)
    {
        try {
            $mediafeedbacks = Feedback::where('reviewed', $storeid)->where('reviewedtype', FeedbackTypesEnum::PUBLISHER)->avg('value');
            if (empty($mediafeedbacks)) {
                return response(null, \Illuminate\Http\Response::HTTP_NO_CONTENT);
            }
            return response(['media' => $mediafeedbacks]);
        } catch (\Exception $exc) {
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function getPublisherFeedbackList($storeid)
    {
        try {
            $feedbacks = Feedback::where('reviewed', $storeid)->where('reviewedtype', FeedbackTypesEnum::PUBLISHER)->paginate(20);
            if (empty($feedbacks)) {
                return response(null, \Illuminate\Http\Response::HTTP_NO_CONTENT);
            }
            return response(new FeedbackPaginatedResource($feedbacks));
        } catch (\Exception $exc) {
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function getProductDetails($productid)
    {
        try {
            $product = Product::find($productid);
            if (empty($product)) {
                return response(null, \Illuminate\Http\Response::HTTP_NO_CONTENT);
            }
            return response(new ProductResource($product));
        } catch (\Exception $exc) {
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function saveProductFeedback(Request $request)
    {
        $validatedData = $request->validate([
            'value' => 'required',
            'productcode' => 'required',
        ]);
        try {
            DB::beginTransaction();
            $userid = Auth::user()->id;
            $req = array_merge($validatedData, [
                'reviewer' => $userid,
                'reviewertype' => FeedbackTypesEnum::CUSTOMER,
                'reviewed' => $request->input('productcode'),
                'reviewedtype' => FeedbackTypesEnum::PRODUCT
            ]);
            $saved = Feedback::create($req);

            DB::commit();
            return response(new SuccessResource(null));
        } catch (\Exception $exc) {
            DB::rollBack();
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function savePublisherFeedback(Request $request)
    {
        $validatedData = $request->validate([
            'value' => 'required',
            'storeid' => 'required',
        ]);
        try {
            DB::beginTransaction();
            $userid = Auth::user()->id;
            $req = array_merge($validatedData, [
                'reviewer' => $userid,
                'reviewertype' => FeedbackTypesEnum::CUSTOMER,
                'reviewed' => $request->input('storeid'),
                'reviewedtype' => FeedbackTypesEnum::PUBLISHER
            ]);
            $saved = Feedback::create($req);

            DB::commit();
            return response(new SuccessResource(null));
        } catch (\Exception $exc) {
            DB::rollBack();
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function proposeAppointment(Request $request)
    {
        $validatedData = $request->validate([
            'appointmentdate' => 'required',
            'appointmentime' => 'required',
            'productcode' => 'required',
            'publisherid' => 'required',
        ]);
        try {
            DB::beginTransaction();
            $userid = Auth::user()->id;

            $check = RequestAds::where('userid', $userid)->where('publisherid', $request->input('publisherid'))->first();

            if (!empty($check)) {
                $groupcode = $check->groupcode;
            } else {
                $groupcode = Str::uuid()->toString();
            }

            $req = array_merge($validatedData, [
                'userid' => $userid,
                'status' => RequestStatusEnum::PENDING,
                'productid' => $request->input('productcode'),
                'publisherid' => $request->input('publisherid'),
                'quantity' => 1,
                'groupcode' => $groupcode
            ]);
            $saved = RequestAds::create($req);

            DB::commit();
            return response(new SuccessResource(null));
        } catch (\Exception $exc) {
            DB::rollBack();
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function markPublisher(Request $request)
    {
        $validatedData = $request->validate([
            'comment' => 'required',
            'publisherid' => 'required',
        ]);
        try {
            DB::beginTransaction();
            $userid = Auth::user()->id;
            $req = array_merge(
                $validatedData,
                [
                    'marker' => $userid,
                    'markertype' => UserMarkTypeEnum::CUSTOMER,
                    'marked' => $request->input('publisherid'),
                    'markedtype' => UserMarkTypeEnum::PUBLISHER,
                    'comment' => $request->input('comment')
                ]
            );
            $saved = Mark::create($req);

            DB::commit();
            return response(new SuccessResource(null));
        } catch (\Exception $exc) {
            DB::rollBack();
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function editAppointment(Request $request)
    {
        $validatedData = $request->validate([
            'requestcode' => 'required',
            'appointmentdate' => 'required',
            'appointmentime' => 'required',
        ]);
        try {
            DB::beginTransaction();
            $ads = RequestAds::find($request->input('requestcode'));
            if (empty($ads)) {
                return response(null, \Illuminate\Http\Response::HTTP_NO_CONTENT);
            }
            $ads->appointmentdate = $request->input('appointmentdate');
            $ads->appointmentime = $request->input('appointmentime');
            $ads->save();
            DB::commit();

            return response(new SuccessResource(null));
        } catch (\Exception $exc) {
            DB::rollBack();
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function canPropose(Request $request)
    {
        $validatedData = $request->validate([
            'publisherid' => 'required',
        ]);
        try {
            $userid = Auth::user()->id;
            $publisher = $request->input('publisherid');
            $ads = RequestAds::where('userid', $userid)->where('publisherid', $publisher)->get();
            return response(['check' => $ads->count() == 0]);
        } catch (\Exception $exc) {
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function hasVoted($id)
    {
        try {
            $userid = Auth::user()->id;
            $voted = Feedback::where('reviewer', $userid)->where('reviewed', $id)->get();
            return response(['check' => $voted->count() != 0]);
        } catch (\Exception $exc) {
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function getDiscountedProducts($publisherid)
    {
        try {
            $products = Product::with('pricelist.offers')->whereHas('pricelist.offers', function ($q) {
                $q->where('isactive', 1)
                    ->where('startdate', '<=', Carbon::now())
                    ->where('endate', '>', Carbon::now());
            })
                ->where('storeid', $publisherid)
                //->where('ispublished', 1)
                ->paginate(20);
            return response(new ProductPaginatedResource($products));
        } catch (\Exception $exc) {
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function getAllDiscountedProducts()
    {
        try {
            $products = Product::with('pricelist.offers')->whereHas('pricelist.offers', function ($q) {
                $q->where('isactive', 1)
                    ->where('startdate', '<=', Carbon::now())
                    ->where('endate', '>', Carbon::now());
            })
                //->where('ispublished', 1)
                ->paginate(20);
            return response(new ProductPaginatedResource($products));
        } catch (\Exception $exc) {
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    /* insert in tabella follow */
    public function followPublisher(Request $request)
    {
        $validatedData = $request->validate([
            'storeid' => 'required',
        ]);
        try {
            DB::beginTransaction();
            $userid = Auth::user()->id;
            $store = Store::find($request->input('storeid'));
            $req = array_merge($validatedData, [
                'userid' => $userid
            ]);
            $saved = Follow::create($req);
            DB::commit();
            $data = [
                'title' => 'Qualcuno ha iniziato a seguirti',
                'description' => 'Vai al tuo profilo',
                'userid' => $store->user->id,
                'action' => CustomNotificationTypeEnum::NEW_FOLLOWER,
                'type' => NotificationActionTypeEnum::DO_NOTHING,
                'extrafield' => $store->id
            ];
            CreateNotificationProcess::dispatch($data);
            return response(new SuccessResource(null));
        } catch (\Exception $exc) {
            DB::rollBack();
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    /* delete dalla tabella follow */
    public function unFollowPublisher(Request $request)
    {
        $validatedData = $request->validate([
            'publisherid' => 'required',
        ]);
        try {
            $userid = Auth::user()->id;
            DB::beginTransaction();
            $req = Follow::where('storeid', $request->input('publisherid'))->where('userid', $userid)->first();
            if (!empty($req)) {
                $req->delete();
                DB::commit();
                return response(new SuccessResource(null));
            } else {
                return response(null, \Illuminate\Http\Response::HTTP_NOT_MODIFIED);
            }
        } catch (\Exception $exc) {
            DB::rollBack();
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * get follower list
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function getFollowed()
    {
        try {
            $userid = Auth::user()->id;

            $followes = Follow::where('userid', $userid)->paginate(20);
            if (empty($followes)) {
                return response(null, \Illuminate\Http\Response::HTTP_NO_CONTENT);
            }

            return response(new FollowStoreSmallPaginateResource($followes));
        } catch (\Exception $exc) {
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    /* conta dei seguiti per publisher */
    public function getCountFollowForPublisher($publisherid) //da inserire anche per publisher
    {
        try {
            $count = $this->getCountFollow($publisherid);
            return response(['followercount' => $count]);
        } catch (\Exception $exc) {
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    private function getCountFollow($publisherid)
    {
        $count = Follow::where('storeid', $publisherid)->count();
        return $count;
    }

    /* check in tabella follow e restituisce un booleano */
    public function getHasFollow($publisherid)
    {
        try {
            $userid = Auth::user()->id;

            $ismorezero = Follow::where('storeid', $publisherid)->where('userid', $userid)->count();
            return response(['hasfollow' => $ismorezero > 0 ? true : false]);
        } catch (\Exception $exc) {
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    /* insert nella tabella favourites */
    public function favouriteProduct(Request $request)
    {
        $validatedData = $request->validate([
            'productid' => 'required',
        ]);
        try {
            DB::beginTransaction();
            $userid = Auth::user()->id;
            $req = array_merge($validatedData, [
                'userid' => $userid
            ]);
            $saved = Favourite::create($req);
            DB::commit();
            $product = Product::find($request->input('productid'));
            $data = [
                'title' => 'Qualcuno ha messo nei preferiti un tuo annuncio',
                'description' => 'Vai ai tuoi annunci',
                'userid' => $product->store->user->id,
                'action' => CustomNotificationTypeEnum::FAVOURITE_PRODUCT,
                'type' => NotificationActionTypeEnum::GOTO_PRODUCT,
                'extrafield' => $product->id
            ];
            CreateNotificationProcess::dispatch($data);
            return response(new SuccessResource(null));
        } catch (\Exception $exc) {
            DB::rollBack();
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    /* delete dalla tabella favourites */
    public function unFavouriteProduct(Request $request)
    {
        $validatedData = $request->validate([
            'productid' => 'required',
        ]);
        try {
            DB::beginTransaction();
            $userid = Auth::user()->id;
            $req = Favourite::where('productid', $request->input('productid'))->where('userid', $userid)->first();
            if (!empty($req)) {
                $req->delete();
                DB::commit();
                return response(new SuccessResource(null));
            } else {
                return response(null, \Illuminate\Http\Response::HTTP_NOT_MODIFIED);
            }
        } catch (\Exception $exc) {
            DB::rollBack();
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    /* restituzione di una lista di prodotti favoriti per lo user loggato */
    public function getListOfFavouriteProducts()
    {
        try {
            $userid = Auth::user()->id;
            $favourites = Favourite::where('userid', $userid)->paginate(20);
            if (count($favourites) == 0) {
                return response(null, \Illuminate\Http\Response::HTTP_NO_CONTENT);
            }
            return response(new FavouriteProductPaginateResource($favourites));
        } catch (\Exception $exc) {
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    /* restituzione un booleano se il prodotto è nei favoriti per lo user loggato */
    public function getFavouriteProduct($productid)
    {
        try {
            $result = false;
            if (!empty(Auth::user())) {
                $userid = Auth::user()->id;
                $favourite = Favourite::where('userid', $userid)->where('productid', $productid)->count();
                $result = $favourite > 0 ? true : false;
            }
            return response(['hasfavourite' => $result]);
        } catch (\Exception $exc) {
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    /* lista dei thunderdeals attivi (isactive) */
    public function getActiveThunderDealsList()
    {
        try {
            $today = Carbon::now();
            $thunderdeals =  ThunderDeal::where('isactive', 1)->where('startdate', '<=', $today)->where('enddate', '>=', $today)->paginate(10); //inserire date e paginare
            if (empty($thunderdeals)) {
                return response(null, \Illuminate\Http\Response::HTTP_NO_CONTENT);
            }
            return response(['deals' => new ThunderDealPaginatedResource($thunderdeals)]);
        } catch (\Exception $exc) {
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function getThunderDealProductsList($thunderid)
    {
        try {
            $products = Product::join('pricelists', 'products.id', '=', 'pricelists.productid')->join('offers', 'pricelists.id', '=', 'offers.pricelistid')->where('offers.thunderid', $thunderid)->paginate(20);
            return response(new ProductPaginatedResource($products));
        } catch (\Exception $exc) {
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function getNotificationList()
    {
        try {
            $userid = Auth::user()->id;
            $notifications = CustomNotification::where('userid', $userid)->orderBy('updated_at', 'DESC')->paginate(20);
            if (empty($notifications)) {
                return response(null, \Illuminate\Http\Response::HTTP_NO_CONTENT);
            }
            return response(['notification' => new CustomNotificationActionPaginatedResource($notifications)]);
        } catch (\Exception $exc) {
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function markAsRead(Request $request)
    {
        $validate = $request->validate([
            'notificationid' => 'required',
        ]);
        try {
            $userid = Auth::user()->id;
            DB::beginTransaction();
            $notification =  CustomNotification::where('notificationid', $request->input('notificationid'))->where('userid', $userid)->first();
            $notification->isread = 1;
            $notification->save();
            DB::commit();
            return response(new SuccessResource(null));
        } catch (\Exception $exc) {
            DB::rollBack();
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function markAllAsRead(Request $request)
    {
        try {
            $userid = Auth::user()->id;
            DB::beginTransaction();
            $notifications = CustomNotification::where('userid', $userid)->get();
            foreach ($notifications as $notification) {
                $notification->isread = 1;
                $notification->save();
            }
            DB::commit();
            return response(new SuccessResource(null));
        } catch (\Exception $exc) {
            DB::rollBack();
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function insertNotification(Request $request)
    {
        $validate = $request->validate([
            'type' => 'required',
            'action' => 'required',
            'title' => 'required',
            'description' => 'required',
            'userid' => 'required',
        ]);
        try {
            DB::beginTransaction();
            $notification =  NotificationAction::where('type', $request->input('type'))->first();
            $req = array_merge($validate, [
                'actionid' => $notification->id,
                'type' => $request->input('action'),
                'isread' => 0
            ]);
            $saved  = CustomNotification::create($req);
            DB::commit();
            return response(new SuccessResource(null));
        } catch (\Exception $exc) {
            DB::rollBack();
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * @OA\Get(
     *      path="/getpublisherbyname/{businessname}",
     *      operationId="getPublisherByName",
     *      tags={"AdminController"},
     *      summary="Get publisher",
     *      description="Returns publisher from name",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          description="Publisher name",
     *          in="path",
     *          name="businessname",
     *          required=true,
     *          example="publisher1",
     *              @OA\Schema(
     *                  type="string"
     *              )
     *      ),
     *      @OA\Response(
     *        response=200,
     *        description="Publisher info by name",
     *        @OA\JsonContent(
     *          @OA\Property(property="publisher", type="array", collectionFormat="multi",
     *              @OA\Items(
     *                  @OA\Property(property="businessname", type="string"),
     *                  @OA\Property(property="id", type="string"),
     *              )
     *         )
     *       )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Unauthenticated")
     *          )
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="No content",
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="Impossibile eseguire operazione",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Impossibile eseguire operazione"),
     *              @OA\Property(property="error", type="string", example="Errore generico"),
     *          )
     *      )
     *   )
     */
    /**
     * @param $businessname
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function getPublisherByName($categorycode, $businessname = null)
    {
        try {
            if (!empty($businessname)) {
                $store = Store::where('categorycode', $categorycode)->where(DB::raw('UPPER(businessname)'), 'LIKE', '%' . strtoupper($businessname) . '%')->get();
            } else {
                $store = Store::where('categorycode', $categorycode)->get();
            }
            if (count($store) == 0) {
                return response(null, \Illuminate\Http\Response::HTTP_NO_CONTENT);
            }
            return response(['publisher' => StoreSmallResource::collection($store)]);
        } catch (\Exception $exc) {
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function addShippingAddressToRequest(Request $request)
    {
        $validatedData = $request->validate([
            'groupcode' => 'required',
            'shippingaddress' => 'required',
        ]);
        try {
            DB::beginTransaction();

            $ads = RequestAds::where('groupcode', $request->input('groupcode'))->get();
            foreach ($ads as $ad) {
                $ad->shippingaddress = $request->input('shippingaddress');
                $ad->save();
            }
            DB::commit();
            return response(new SuccessResource(null));
        } catch (\Exception $exc) {
            DB::rollBack();
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function getPublisherProductSearch(Request $request)
    {
        $validatedData = $request->validate([
            'storeid' => 'required'
        ]);
        try {
            $products = Product::where('storeid', $request->input('storeid'))->when($request->filled('testo'), function ($query) use ($request) {
                return $query->whereRaw(' ( title LIKE ? OR description LIKE ? )', ["%{$request->input('testo')}%", "%{$request->input('testo')}%"]);
            })->orderBy('updated_at', 'desc')->paginate(10);
            if (empty($products)) {
                return response(null, \Illuminate\Http\Response::HTTP_NO_CONTENT);
            }
            return response(new SearchProductPaginateResource($products));
        } catch (\Exception $exc) {
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function getPublishers()
    {
        try {      
            $products = Product::select('storeid')
                ->groupBy('storeid');
            
            $publishers = DB::table('stores')
            ->joinSub($products,'products',function($join){
                $join->on('stores.id','=','products.storeid');
            })
            ->select('id','latitude','longitude')
            ->get();

            return response(['publishers' => $publishers]);
        } catch (\Exception $exc) {
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }
}
