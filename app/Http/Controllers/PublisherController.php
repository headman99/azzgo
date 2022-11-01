<?php

namespace App\Http\Controllers;

use App\Enums\ContactTypeEnum;
use App\Enums\CustomNotificationTypeEnum;
use App\Enums\FeedbackTypesEnum;
use App\Enums\NotificationActionTypeEnum;
use App\Enums\ProductTypeEnum;
use App\Enums\RequestStatusEnum;
use App\Enums\StoreCategoriesEnum;
use App\Enums\UserMarkTypeEnum;
use App\Http\Resources\AppointmentResource;
use App\Http\Resources\ContactTypeResource;
use App\Http\Resources\CustomNotificationActionPaginatedResource;
use App\Http\Resources\ErrorResource;
use App\Http\Resources\FeedbackPaginatedResource;
use App\Http\Resources\InfoBoxResouce;
use App\Http\Resources\PhotoResource;
use App\Http\Resources\ProductPaginatedResource;
use App\Http\Resources\ProductResource;
use App\Http\Resources\RequestHistoryPublisherConsumerPaginateResource;
use App\Http\Resources\RequestProductPaginateResource;
use App\Http\Resources\RequestPublisherCustomerPaginateResource;
use App\Http\Resources\StoreCompleteResource;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\ThunderDealPaginatedResource;
use App\Http\Resources\ThunderDealResource;
use App\Jobs\CreateNotificationProcess;
use App\Jobs\CreateProductFolowerProcess;
use App\Jobs\CreateProductOffertFollowerProcess;
use App\Models\Contact;
use App\Models\ContactType;
use App\Models\CustomNotification;
use App\Models\Favourite;
use App\Models\Feedback;
use App\Models\Follow;
use App\Models\Mark;
use App\Models\NotificationAction;
use App\Models\Offer;
use App\Models\Photo;
use App\Models\Pricelist;
use App\Models\Product;
use App\Models\RequestAds;
use App\Models\RequestHistory;
use App\Models\Review;
use App\Models\ThunderDeal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PublisherController extends Controller
{
    public function __construct() {
        $this->middleware(['auth']);
    }

    public function insertAds(Request $request)
    {
        // gestione isvetrina mi deve arrivare
        // logica se è true devo aggiornare fare una ricerca per prodotti con  update_at
        // maggiore di quest'anno ed aggiorno con la data di oggi e quello da inserire metto con la data da qui ad un anno

        $validate = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric|min:0.01'
        ]);
        try {
            DB::beginTransaction();
            $storeid = Auth::user()->store->id;
            $storecategorycode = Auth::user()->store->categorycode;
            $type = $request->filled('type') ? $request->input('type') : ($storecategorycode == StoreCategoriesEnum::SERVICE ? ProductTypeEnum::SERVICE : ProductTypeEnum::PRODUCT);
            $product = array_merge($validate, ['storeid' => $storeid, 'type' => $type]);

            $product = $this->vetrinaCreation($request, $product, $storeid);

            $savedproduct = Product::create($product);
            $pricelist = PriceList::create([
                'productid' => $savedproduct->id,
                'price' => $request['price'],
            ]);
            if($request->input('isoffer') == 'true'){
               $validate = $request->validate([
                    'saleprice' => 'numeric|min:0.01',
                    'startdate' => 'date_format:d/m/Y', //da inserire check su today
                    'enddate' => 'date_format:d/m/Y|after_or_equal:startdate',
                    'percent' => 'numeric|min:1'
                ]);
                $offer = Offer::create([
                    'pricelistid' => $pricelist->id,
                    'price' => $request['saleprice'],
                    'startdate' => $request['startdate'],
                    'endate' => $request['enddate'],
                    'percent' => $request['percent'],
                    'isactive' => $request['isoffer']
                ]);
            }
            $getproduct = $savedproduct;
            DB::commit();
            $data = ['productid' => $savedproduct->id,
                    'title' => 'Un azienda che segui ha inserito un nuovo annuncio',
                    'description' => 'Vai al prodotto',
                    'action' => CustomNotificationTypeEnum::NEW_PRODUCT_FOLLOW,
                    'type' => NotificationActionTypeEnum::GOTO_PRODUCT,
                    'extrafield' => $savedproduct->id
                    ];
            CreateProductFolowerProcess::dispatch($data);
            //da rivedere la response
            return response(new ProductResource($getproduct));
        }catch (\Exception $exc)
        {
            DB::rollback();
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function editAds(Request $request)
    {
        // gestione isvetrina mi deve arrivare
        // logica se è true devo aggiornare fare una ricerca per prodotti con  update_at
        // maggiore di quest'anno ed aggiorno con la data di oggi e quello da inserire metto con la data da qui ad un anno
        $validate = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric|min:0.01'
        ]);
        try {
            DB::beginTransaction();
            $storeid = Auth::user()->store->id;
            $adedit = Product::where('id', $request->input('id'))->
                               where('storeid', $storeid)->first();

            $validate = $this->vetrinaCreation($request, $validate, $storeid);

            $adedit->update($validate);
            $pricelist = Pricelist::where('productid', $adedit->id)->first();
            $pricelist->update($validate);
            if($request->filled('isoffer') && $request['isoffer'] == 1){
                $validate = $request->validate([
                    'saleprice' => 'numeric|min:0.01',
                    'startdate' => 'date_format:d/m/Y',
                    'enddate' => 'date_format:d/m/Y|after_or_equal:startdate',
                    'percent' => 'numeric|min:1'
                ]);
                $offer = Offer::where('pricelistid', $pricelist->id)->first();
                if(!empty($offer)){
                    $offer->update([
                        'price' => $request['saleprice'],
                        'startdate' => $request['startdate'],
                        'endate' => $request['enddate'],
                        'isactive' => $request['isoffer'],
                        'percent' => $request['percent']
                    ]);

                }else{
                    Offer::create([
                        'pricelistid' => $pricelist->id,
                        'price' => $request['saleprice'],
                        'startdate' => $request['startdate'],
                        'endate' => $request['enddate'],
                        'isactive' => $request['isoffer'],
                        'percent' => $request['percent']
                    ]);
                }
                // devo inviare la notifica
                $data = ['productid' => $adedit->id,
                    'title' => 'Un azienda che segui ha inserito un prodotto in offerta',
                    'description' => 'Vai al prodotto',
                    'action' => CustomNotificationTypeEnum::NEW_OFFER_FOLLOW,
                    'type' => NotificationActionTypeEnum::GOTO_PRODUCT,
                    'extrafield' => $adedit->id
                ];
                CreateProductOffertFollowerProcess::dispatch($data);
            }else if($request->filled('isoffer') && $request['isoffer'] == 0){
                $offer = Offer::where('pricelistid', $pricelist->id)->first();
                if (!empty($offer)){
                    $offer->update([
                        'isactive' => $request['isoffer']
                    ]);
                }
            }
            $ad = $this->getAdId($adedit->id);
            DB::commit();
            return response(['ad'=> new ProductResource($ad)]);
        }catch (\Exception $exc)
        {
            DB::rollback();
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * @OA\Post(
     * path="/uploadPhoto",
     * summary="Publisher upload file",
     * description="Publisher upload file",
     * operationId="uploadPhoto",
     * tags={"PublisherController"},
     * security={ {"bearer": {} }},
     * @OA\RequestBody(
     *    required=true,
     *    description="Photo info and reference",
     *    @OA\JsonContent(
     *       required={"file", "extidtype","extid"},
     *       @OA\Property(property="file", type="string", format="binary"),
     *       @OA\Property(property="extidtype", type="string", description="Type of photo user publisher ads",  example={"A", "U", "P"}, schema={"type": "string", "enum": {"A", "U", "P"}}),
     *       @OA\Property(property="extid", type="string", description="Id reference for table master"),
     *    )
     * ),
     * @OA\Response(
     *          response=200,
     *          description="photo info",
     *          @OA\JsonContent(
     *              @OA\Property(property="photo", type="object",
     *                      @OA\Property(property="id", type="string"),
     *                      @OA\Property(property="ismain", type="boolean", example="1"),
     *                      @OA\Property(property="path", type="string"),
     *              )
     *          )
     * ),
     * @OA\Response(
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
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function uploadPhoto(Request $request)
    {
        $validate = $request->validate([
            'file' => 'required|max:10240',
            'extid' => 'required',
            'extidtype' => 'required',
            'ismain' => 'required',
        ]);
        try {
            DB::beginTransaction();
            $storeid = Auth::user()->id;
            $uuid = Str::uuid()->toString();
            $filextension = $request->file('file')->getClientOriginalExtension();
            $fileName = $uuid . $filextension;

            $relativePath = getPathPublic() . getPathDocumenti() . $storeid . '/';
            $rootDocumento =  getFullPathStorage($relativePath);
            if (!File::exists($rootDocumento))
            {
                File::makeDirectory($rootDocumento, 0777, true);
            }
            if($request->input('ismain') == 1)
            {
                $photos = Photo::where('extid', $request->input('extid'))->
                                 where('extidtype', $request->input('extidtype'))->
                                 where('ismain', 1)->
                                 get();
                if(!empty($photos))
                {
                    foreach ($photos as $photo)
                    {
                        $photo->delete();
                        $pathAndFile = getFullPathStorage($relativePath);

                        if(!empty($pathAndFile) && file_exists($pathAndFile)) {
                            File::delete($pathAndFile);
                        }
                    }
                }
            }

            $photo = Photo::create([
                'extidtype' => $request->input('extidtype'),
                'extid' => $request->input('extid'),
                'path' => $relativePath . $fileName,
                'ismain' => $request->input('ismain'),
            ]);

            request()->file->move($rootDocumento, $fileName);
            DB::commit();
            return response(['photo' => new PhotoResource($photo)]);
        }catch (\Exception $exc)
        {
            DB::rollback();
            if(!empty($rootDocumento) && file_exists($rootDocumento . $fileName)) {
                File::delete($rootDocumento . $fileName);
            }
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function deletePhoto(Request $request)
    {
        $validate = $request->validate([
            'id' => 'required',
        ]);
        try {
            DB::beginTransaction();

            $photo = Photo::find($request->input('id'));
            $pathAndFile = getFullPathStorage($photo->path);
            if(!empty($photo))
            {
                $photo->delete();
            }

            if(!empty($pathAndFile) && file_exists($pathAndFile)) {
                File::delete($pathAndFile);
            }
            DB::commit();
            return response(new SuccessResource(null));
        }catch (\Exception $exc)
        {
            DB::rollback();
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * @OA\Get(
     *      path="/deleteadbyid/{id}",
     *      operationId="deleteadbyid",
     *      tags={"PublisherController"},
     *      summary="Delete ads",
     *      description="Delete all ads with photo offert and pricelist",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          description="ID of ads",
     *          in="path",
     *          name="id",
     *          required=true,
     *          example="sadf-dfasdf-234df-sfasdf",
     *              @OA\Schema(
     *                  type="string"
     *              )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Success operation",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Salvataggio eseguito con successo")
     *          )
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
     * @param $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function deleteadbyid($id)
    {
        try{
            DB::beginTransaction();
            $ad = Product::find($id);
            $pricelist = Pricelist::where('productid', $ad->id)->first();
            $offers = Offer::where('pricelistid', $pricelist->id)->first();
            $photos = Photo::where('extid', $ad->id)->get();
            $checkrequest = RequestAds::where('productid', $id)->first();
            $checkhistory = RequestHistory::where('productid', $id)->first();
            $checkfavourite = Favourite::where('productid', $id)->first();
            if(!empty($checkrequest) || !empty($checkhistory) || !empty($checkfavourite)){
                return response(["message" => "Impossibile cancellare il prodotto, è stato inserito in richieste o preferiti!", "error" => "Errore Generico"], \Illuminate\Http\Response::HTTP_BAD_REQUEST);
            }
            foreach($photos as $photo){
                $path = getFullPathStorage($photo->path);
                if(!empty($path) && file_exists($path)) {
                    \File::delete($path);
                }
                $photo->delete();
            }
            if(!empty($offers)){
                $offers->delete();
            }
            if(!empty($pricelist)){
                $pricelist->delete();
            }
            $ad->delete();
            DB::commit();
            return response(new SuccessResource(null));
        }catch (\Exception $exc) {
            DB::rollback();
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function getAdsByPublisherId()
    {
        try {
            $storeid = Auth::user()->store->id;
        // per la ricerca gestione in productresouce con update_at se è maggiore di quest'anno mettere isvetrina
            $ads = Product::where('storeid', $storeid)->orderby('updated_at', 'DESC')->paginate(20);
            if($ads->count() == 0)
            {
                return response(null, \Illuminate\Http\Response::HTTP_NO_CONTENT);
            }
           return response(new ProductPaginatedResource($ads));
       }catch (\Exception $exc)
        {
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function getAdById($id)
    {
        // per la ricerca gestione in productresouce con update_at se è maggiore di quest'anno mettere isvetrina
        try {
            $ad = $this->getAdId($id);
            if($ad->count() == 0)
            {
                return response(null, \Illuminate\Http\Response::HTTP_NO_CONTENT);
            }
            return response(['ad' => new ProductResource($ad)]);
        }catch (\Exception $exc)
        {
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }


    public function getProfile()
    {
        try {
            $store = Auth::user()->store;
            return response(['store' => new StoreCompleteResource($store)]);
        }catch (\Exception $exc)
        {
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function changeItemStatusFromRequest(Request $request){
        $validatedData = $request->validate([
            'id' => 'required',
            'status' => 'required',
        ]);
        try {
            DB::beginTransaction();
            $requestfromlist = RequestHistory::find($request->input('id'));
            $requestfromlist->status = $request->input('status');
            $requestfromlist->save();
            DB::commit();
            return response(new SuccessResource(null));
        }catch (\Exception $exc)
        {
            DB::rollback();
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function changeAllItemsStatusFromRequest(Request $request){
        $validatedData = $request->validate([
            'customerid' => 'required',
        ]);
        try {
            DB::beginTransaction();
            $authpublisher = Auth::user()->id;
            $customerid = $request->input('customerid');
            $requestslist = RequestHistory::where('publisherid', $authpublisher)->where('userid', $customerid)->get();
            foreach ($requestslist as $requestfromlist){
                $requestfromlist->status = $request->input('status');
                $requestfromlist->save();
            }
            DB::commit();
            return response(new SuccessResource(null));
        }catch (\Exception $exc)
        {
            DB::rollback();
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function getRequests($status){
        try {
            $publisherid = Auth::user()->store->id;
            $reqs = RequestAds::selectRaw('userid, groupcode, COUNT(productid) AS productcount')->where('publisherid', $publisherid)->where('status', $status)->distinct()->groupBy('userid', 'groupcode')->orderBy('updated_at', 'DESC')->paginate(20);
            if(empty($reqs))
            {
                return response(null, \Illuminate\Http\Response::HTTP_NO_CONTENT);
            }
            return response(new RequestPublisherCustomerPaginateResource($reqs));
        }catch (\Exception $exc)
        {
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function getRequestsHistory(){
        try {
            $publisherid = Auth::user()->store->id;
            $reqs = RequestHistory::selectRaw('status, closed_at, groupcode, userid, COUNT(productid) AS productcount')->where('publisherid', $publisherid)->distinct()->groupBy(['userid', 'groupcode', 'closed_at', 'status'])->orderBy('closed_at', 'DESC')->paginate(20);
            if(empty($reqs))
            {
                return response(null, \Illuminate\Http\Response::HTTP_NO_CONTENT);
            }
            return response(new RequestHistoryPublisherConsumerPaginateResource($reqs));
        }catch (\Exception $exc)
        {
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function getRequestDetails($userid, $status)
    {
        try {
            $publisherid = Auth::user()->store->id;
            $reqs = RequestAds::where('userid', $userid)
                ->where('publisherid', $publisherid)
                ->where('status', $status)
                ->paginate(20);
            if(empty($reqs))
            {
                return response(null, \Illuminate\Http\Response::HTTP_NO_CONTENT);
            }
            return response(['requests' => new RequestProductPaginateResource($reqs)]);
        }catch (\Exception $exc)
        {
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function getRequestDetailsHistory($userid, $groupcode)
    {
        try {
            $publisherid = Auth::user()->store->id;
            $reqs = RequestHistory::where('userid', $userid)
                ->where('publisherid', $publisherid)
                ->where('groupcode', $groupcode)
                ->paginate(20);
            if(empty($reqs))
            {
                return response(null, \Illuminate\Http\Response::HTTP_NO_CONTENT);
            }
            return response(['requests' => new RequestProductPaginateResource($reqs)]);
        }catch (\Exception $exc)
        {
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function getContactTypes(){
        try {
            $types = ContactType::all();
            return response(['contactypes' => ContactTypeResource::collection($types)]);
        }catch (\Exception $exc)
        {
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function addContact(Request $request){
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
        }catch (\Exception $exc)
        {
            DB::rollBack();
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function editContact(Request $request){
        $validatedData = $request->validate([
            'id' => 'required',
            'value' => 'required',
        ]);
        try {
            DB::beginTransaction();
            $contact = Contact::find($request->input('id'));
            if(!empty($contact)){
                if ($contact->typecode == ContactTypeEnum::ADDRESS){
                    if($request->filled('latitude') && $request->filled('longitude'))
                    {
                        $contact->user->store->latitude = $request->input('latitude');
                        $contact->user->store->longitude = $request->input('longitude');
                        $contact->user->store->save();
                    }
                    else
                    {
                        return response(['message' => 'I campi Latitudine e Longitudine sono obbligatori'], Response::HTTP_UNPROCESSABLE_ENTITY);
                    }
                }
                $contact->value = $request->input('value');
                $contact->save();
                DB::commit();
                return response(new SuccessResource(null));
            }
            else
            {
                return response(null, \Illuminate\Http\Response::HTTP_NO_CONTENT);
            }
        }catch (\Exception $exc)
        {
            DB::rollBack();
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function changeRequestStatus(Request $request){
        $validatedData = $request->validate([
            'status' => 'required',
            'requestcode' => 'required'
        ]);
        try {
            DB::beginTransaction();
            $uuid = str::uuid()->toString();
            $result = false;
            foreach ($request->get('requestcode') as $req) {
                $ads = RequestAds::find($req);
                $userid = $ads->userid;
                $type = $ads->product->type;
                switch ($type){
                    case ProductTypeEnum::SERVICE :
                        $result = $this->moveAppointmentToHistory($uuid, $req, $request->input('status'), $request->input('endate'), $request->input('endtime'));
                        break;
                    default:
                        $result = $this->moveToHistory($uuid, $req, $request->input('status'));
                }
            }
            DB::commit();
            if($result){
                $status = $request->input('status');
                $publisherid = Auth::user()->store->id;
                $data = [];
                switch ($status)
                {
                    case RequestStatusEnum::ACCEPTED:
                        $data = [
                            'title' => 'E\' stata accettata la tua richiesta',
                            'description' => 'Vai alle tue richieste',
                            'userid' => $userid,
                            'action' => CustomNotificationTypeEnum::REQUEST_ACCEPTED,
                            'type' => NotificationActionTypeEnum::GOTO_REQUEST];
                        break;
                    case RequestStatusEnum::SENDTOPUBLISHER:
                        $data = [
                            'title' => 'E\' arrivata una nuova richiesta',
                            'description' => 'Vai alle tue richiesta',
                            'userid' =>  Auth::user()->id,
                            'action' => CustomNotificationTypeEnum::REQUEST_ARRIVED,
                            'type' => NotificationActionTypeEnum::GOTO_REQUEST];
                        break;
                    case RequestStatusEnum::DENIED:
                        $data = [
                            'title' => 'E\' stata negata una richiesta di acquisto',
                            'description' => 'Vai alle tue richieste',
                            'userid' => $userid,
                            'action' => CustomNotificationTypeEnum::REQUEST_DENIED,
                            'type' => NotificationActionTypeEnum::GOTO_REQUEST];
                        break;
                }
                if(count($data) > 0)
                {
                    CreateNotificationProcess::dispatch($data);
                }
                return response(new SuccessResource(null));
            }
            else
            {
                return response(null, \Illuminate\Http\Response::HTTP_NO_CONTENT);
            }
        }catch (\Exception $exc)
        {
            DB::rollBack();
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    private function moveToHistory($uuid, $requestcode, $status){
        $result = false;
        $publisherid = Auth::user()->store->id;
        $requestmove = RequestAds::where('requestcode', $requestcode)
                                  ->where('publisherid', $publisherid)
                                  ->first();
        if(!empty($requestmove)){
            $requestsave = array_merge($requestmove->toArray(), ['closed_at' => Carbon::now(),
                'appointmentdate' => $requestmove->appointmentdate,
                'appointmentime' => $requestmove->appointmentime,
                'groupcode' => $uuid,
                'status' => $status,
                'shippingaddress' => $requestmove->shippingaddress
            ]);
            RequestHistory::create($requestsave);
            RequestAds::where('requestcode', $requestcode)->delete();
            $result = true;
        }
        return $result;
    }

    private function moveAppointmentToHistory($uuid, $requestcode, $status, $endate, $endtime){
        $result = false;
        $publisherid = Auth::user()->store->id;
        $requestmove = RequestAds::where('requestcode', $requestcode)
            ->where('publisherid', $publisherid)
            ->first();
        if(!empty($requestmove)){
            $requestsave = array_merge($requestmove->toArray(), ['closed_at' => Carbon::now(),
                'groupcode' => $uuid,
                'status' => $status,
                'appointmentdate' => $requestmove->appointmentdate,
                'appointmentime' => $requestmove->appointmentime,
                'appointmentenddate' => $endate,
                'appointmentendtime' => $endtime,
                'shippingaddress' => $requestmove->shippingaddress
            ]);
            RequestHistory::create($requestsave);
            RequestAds::where('requestcode', $requestcode)->delete();
            $result = true;
        }
        return $result;
    }

    /**
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function getPublisherFeedback()
    {
        try {
            $storeid = Auth::user()->store->id;
            $mediafeedbacks = Feedback::where('reviewed', $storeid)->where('reviewedtype', FeedbackTypesEnum::PUBLISHER)->avg('value');
            if(empty($mediafeedbacks))
            {
                return response(null, \Illuminate\Http\Response::HTTP_NO_CONTENT);
            }
            return response(['media' => $mediafeedbacks]);
        }catch (\Exception $exc)
        {
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function getPublisherFeedbackList()
    {
        try {
            $storeid = Auth::user()->store->id;
            $feedbacks = Feedback::where('reviewed', $storeid)->where('reviewedtype', FeedbackTypesEnum::PUBLISHER)->paginate(20);
            if(empty($feedbacks))
            {
                return response(null, \Illuminate\Http\Response::HTTP_NO_CONTENT);
            }
            return response(new FeedbackPaginatedResource($feedbacks));
        }catch (\Exception $exc)
        {
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * @param $productid
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function getProductFeedback($productid)
    {
        try {
            $mediafeedbacks = Feedback::where('reviewed', $productid)->where('reviewedtype', FeedbackTypesEnum::PRODUCT)->avg('value');
            if(empty($mediafeedbacks))
            {
                return response(null, \Illuminate\Http\Response::HTTP_NO_CONTENT);
            }
            return response(['media' => $mediafeedbacks]);
        }catch (\Exception $exc)
        {
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function getProductFeedbackList($productid)
    {
        try {
            $feedbacks = Feedback::where('reviewed', $productid)->where('reviewedtype', FeedbackTypesEnum::PRODUCT)->paginate(20);
            if(empty($feedbacks))
            {
                return response(null, \Illuminate\Http\Response::HTTP_NO_CONTENT);
            }
            return response(new FeedbackPaginatedResource($feedbacks));
        }catch (\Exception $exc)
        {
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function markCustomer(Request $request)
    {
        $validatedData = $request->validate([
            'comment' => 'required',
            'customerid' => 'required',
        ]);
        try {
            DB::beginTransaction();
            $userid = Auth::user()->id;
            $req = array_merge($validatedData, [
                    'marker' => $userid,
                    'markertype' => UserMarkTypeEnum::PUBLISHER,
                    'marked' => $request->input('customerid'),
                    'markedtype' => UserMarkTypeEnum::CUSTOMER,
                    'comment' => $request->input('comment')]
            );
            $saved = Mark::create($req);

            DB::commit();
            return response(new SuccessResource(null));
        }catch (\Exception $exc)
        {
            DB::rollBack();
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function getDiscountedProducts(){
        try {
            $publisherid = Auth::user()->store->id;
            $products = Product::with('pricelist.offers')->whereHas('pricelist.offers', function ($q)
            {
                $q->where('isactive', 1)
                    ->where('startdate', '<=', Carbon::now())
                    ->where('endate', '>', Carbon::now());
            })
            ->where('storeid', $publisherid)
            //->where('ispublished', 1)
            ->paginate(20);
            return response(new ProductPaginatedResource($products));
        }catch (\Exception $exc)
        {
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    function getAppointments()
    {
        try {
            $publisherid = Auth::user()->store->id;
            $reqs = RequestHistory::where('publisherid', $publisherid)->get();
            if(empty($reqs))
            {
                return response(null, \Illuminate\Http\Response::HTTP_NO_CONTENT);
            }
            return response(['appointments' => AppointmentResource::collection($reqs)]);
        }catch (\Exception $exc)
        {
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    /*
    public function getProducts()
    {
        try {
            $store = Auth::user()->store;
            $products = Product::where('storeid', $store->id)->paginate(10);
            return response(['products' => new StoreCompleteResource($store)]);
        }catch (\Exception $exc)
        {
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }*/

    /* count dei follower */
    public function getCountFollow()
    {
        try {
            $publisherid = Auth::user()->store->id;
            $count = Follow::where('storeid', $publisherid)->count();
            return response(['followercount' => $count]);
        }catch (\Exception $exc)
        {
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    /* lista dei thunderdeals attivi (isactive) */
    public function getActiveThunderDealsList()
    {
        try {
            $today = Carbon::now();
            $thunderdeals =  ThunderDeal::where('enddate', '>=', $today)->paginate(10);
            if(empty($thunderdeals))
            {
                return response(null, \Illuminate\Http\Response::HTTP_NO_CONTENT);
            }
            return response(['deals' => new ThunderDealPaginatedResource($thunderdeals)]);
        }catch (\Exception $exc)
        {
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function getThunderDealById($thunderid)
    {
        try {
            $thunderdeal = ThunderDeal::find($thunderid);
            if(empty($thunderdeal))
            {
                return response(null, \Illuminate\Http\Response::HTTP_NO_CONTENT);
            }
            return response(new ThunderDealResource($thunderdeal));
        }catch (\Exception $exc)
        {
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function insertThunderDealOfferOnProduct(Request $request)
    {
        try {
            DB::beginTransaction();
            $thunderdeal = ThunderDeal::find($request['thunderid']);
            $product = Product::find($request['productid']);
            $pricelistid = $product->pricelist->id;
            $thunderdealoffer = Offer::create([
                'startdate' => $thunderdeal->datainizio,
                'endate' => $thunderdeal->datafine,
                'price' => $request['price'],
                'percent' => $request['percent'],
                'isactive' => true,
                'pricelistid' => $pricelistid,
                'thunderid' => $thunderdeal->id
            ]);
            DB::commit();
            return response(new SuccessResource(null));
        }catch (\Exception $exc)
        {
            DB::rollBack();
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function editThunderDealOfferOnProduct(Request $request)
    {
        try {
            DB::beginTransaction();
            $thunderdeal = ThunderDeal::find($request['thunderid']);
            $product = Product::find($request['productid']);
            $pricelistid = $product->pricelist->id;
            $thunderdealoffer = Offer::where('pricelistid', $pricelistid)->first();
            $thunderdealoffer->update([
                    'price' => $request['price'],
                    'percent' => $request['percent']
                ]);
            $thunderdealoffer->save();
            DB::commit();
            return response(new SuccessResource(null));
        }catch (\Exception $exc)
        {
            DB::rollBack();
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function getThunderDealProductsList($thunderid)
    {
        try {
            $storeid = Auth::user()->store->id;
            $products = Product::join('pricelists', 'products.id', '=', 'pricelists.productid')->join('offers', 'pricelists.id', '=', 'offers.pricelistid')->where('products.storeid', $storeid)->where('offers.thunderid', $thunderid)->paginate(20);
            return response(new ProductPaginatedResource($products));
        }catch (\Exception $exc)
        {
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function getNotificationList()
    {
        try{
            $userid = Auth::user()->id;
            $notifications = CustomNotification::where('userid', $userid)->orderBy('updated_at', 'DESC')->paginate(20);
            if(empty($notifications))
            {
                return response(null, \Illuminate\Http\Response::HTTP_NO_CONTENT);
            }
            return response(['notification' => new CustomNotificationActionPaginatedResource($notifications)]);
        }catch (\Exception $exc)
        {
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
        }catch (\Exception $exc)
        {
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
            foreach ($notifications as $notification){
                $notification->isread = 1;
                $notification->save();
            }
            DB::commit();
            return response(new SuccessResource(null));
        }catch (\Exception $exc)
        {
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
            $notification = NotificationAction::where('type', $request->input('type'))->first();
            $req = array_merge($validate, [
                'actionid' => $notification->id,
                'type' => $request->input('action'),
                'isread' => 0]);
            $saved  = CustomNotification::create($req);
            DB::commit();
            return response(new SuccessResource(null));
        }catch (\Exception $exc)
        {
            DB::rollBack();
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function getProductDetails($productid)
    {
        try {
            $storeid = Auth::user()->store->id;
            $product = Product::where('storeid',  $storeid)->where('id', $productid)->first();
            if(empty($product))
            {
                return response(null, \Illuminate\Http\Response::HTTP_NO_CONTENT);
            }
            return response(new ProductResource($product));
        }catch (\Exception $exc)
        {
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function getInfoBox($groupcode)
    {
        try {
            $ad = Requestads::where('groupcode', $groupcode)->first();

            if(empty($ad))
            {
                $ad = RequestHistory::where('groupcode', $groupcode)->first();
            }
            return response(new InfoBoxResouce($ad));
        }catch (\Exception $exc)
        {
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }


    /**
     * @param $id
     * @return mixed
     */
    private function getAdId($id)
    {
        $storeid = Auth::user()->store->id;
        return Product::where('storeid', $storeid)->where('id', $id)->first();
    }

    /**
     * @param Request $request
     * @param array $product
     * @return array
     */
    private function vetrinaCreation(Request $request, array $product, $storeid)
    {
        if ($request->filled('isvetrina') && $request->input('isvetrina') == true) {
            $currentDateTime = Carbon::now();
            $newDateTime = Carbon::now()->addDays(1);
            $prod = Product::where('storeid', $storeid)->where('updated_at', '>=', $newDateTime)->first();
            if (!empty($prod) && $prod->count() > 1) {
                $prod->update(['updated_at', $currentDateTime]);
            }
            $nextYear = Carbon::now()->addDays(3650);
            $product = array_merge($product, ['updated_at' => $nextYear]);
        }else{
            $now = Carbon::now();
            $product = array_merge($product, ['updated_at' => $now]);
        }
        return $product;
    }

}
