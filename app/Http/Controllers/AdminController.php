<?php

namespace App\Http\Controllers;

use App\Enums\MarkStatusesEnum;
use App\Http\Resources\ErrorResource;
use App\Http\Resources\CustomNotificationActionPaginatedResource;
use App\Http\Resources\RequestMarkPaginateResource;
use App\Http\Resources\RequestPublisherMarkPaginateResource;
use App\Http\Resources\StoreInactivePaginateCollectionResource;
use App\Http\Resources\StoreResource;
use App\Http\Resources\StoreSmallResource;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\ThunderDealPaginatedResource;
use App\Http\Resources\ThunderDealResource;
use App\Http\Resources\UserResource;
use App\Models\Contact;
use App\Models\CustomNotification;
use App\Models\Mark;
use App\Models\NotificationAction;
use App\Models\Photo;
use App\Models\RequestAds;
use App\Models\Store;
use App\Models\ThunderDeal;
use App\Models\User;
use App\Notifications\UserActivatedNotification;
use App\Notifications\UserBannedNotification;
use App\Notifications\UserUnBannedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{

    public function __construct() {
        $this->middleware(['auth']);
    }

    /**
     * @OA\Get(
     *      path="/getinactivationpublishers",
     *      operationId="getInActivationPublishers",
     *      tags={"AdminController"},
     *      summary="Get inactive publisher",
     *      description="Returns list of publisher not active",
     *      security={ {"bearer": {} }},
     *      @OA\Response(
     *        response=200,
     *        description="List of not active",
     *          @OA\JsonContent(
     *            @OA\Property(property="stores", type="array", collectionFormat="multi",
     *              @OA\Items(
     *                  @OA\Property(property="id", type="string"),
     *                  @OA\Property(property="businessname", type="string"),
     *                  @OA\Property(property="date", type="string", format="date"),
     *              )
     *			  ),
     *            @OA\Property(property="count", type="integer"),
     *            @OA\Property(property="total", type="integer"),
     *            @OA\Property(property="prev", type="string"),
     *            @OA\Property(property="next", type="string"),
     *          )
     *       ),
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
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function getInActivationPublishers(){
        try{
            $storesInactive = Store::with('user')->whereHas('user', function ($query){
                $query->where('isactive', 0);
            })->paginate(20);
            if(empty($storesInactive) || $storesInactive->count() == 0){
                return response(null, \Illuminate\Http\Response::HTTP_NO_CONTENT);
            }
            return response(new StoreInactivePaginateCollectionResource($storesInactive));
        }catch (\Exception $exc)
        {
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * @OA\Get(
     *      path="/getinvalidationpublishers",
     *      operationId="getInValidationPublishers",
     *      tags={"AdminController"},
     *      summary="Get invalidate publisher",
     *      description="Returns list of publisher invalidate",
     *      security={ {"bearer": {} }},
     *      @OA\Response(
     *        response=200,
     *        description="List invalidate publisher",
     *          @OA\JsonContent(
     *            @OA\Property(property="stores", type="array", collectionFormat="multi",
     *              @OA\Items(
     *                  @OA\Property(property="id", type="string"),
     *                  @OA\Property(property="businessname", type="string"),
     *                  @OA\Property(property="date", type="string", format="date"),
     *              )
     *			  ),
     *            @OA\Property(property="count", type="integer"),
     *            @OA\Property(property="total", type="integer"),
     *            @OA\Property(property="prev", type="string"),
     *            @OA\Property(property="next", type="string"),
     *          )
     *       ),
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
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function getInValidationPublishers(){
        try{
            $storesInvalid = Store::with('user')->whereHas('user', function ($query){
                $query->where('isvalid', 0);
            })->paginate(20);
            if(empty($storesInvalid) || $storesInvalid->count() == 0){
                return response(null, \Illuminate\Http\Response::HTTP_NO_CONTENT);
            }
            return response(new StoreInactivePaginateCollectionResource($storesInvalid));
        }catch (\Exception $exc)
        {
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function activateFullPublisher(Request $request){

        $validate = $request->validate([
            'id' => 'required',
        ]);
        try{
            DB::beginTransaction();

            $store = Store::find($request['id']);
            $active = $store->user->isactive == 0 ? 1 : 0;
            if($request->filled('active')){
                $active = $request->input('active');
            }
            $store->user->isactive = $active;
            $store->user->isvalid = $active;
            $store->user->save();
            DB::commit();
            $store->user->notify(new UserActivatedNotification());
            return response(new SuccessResource(null));
        } catch (\Exception $exc) {
            DB::rollback();
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function activatePublisher(Request $request){

       $validate = $request->validate([
           'id' => 'required',
       ]);
        try{
            DB::beginTransaction();

            $store = Store::find($request['id']);
            $active = $store->user->isactive == 0 ? 1 : 0;
            if($request->filled('active')){
                $active = $request->input('active');
            }
            $store->user->isactive = $active;
            $store->user->save();
            DB::commit();
            $store->user->notify(new UserActivatedNotification());
            return response(new SuccessResource(null));
        } catch (\Exception $exc) {
            DB::rollback();
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    //viene ancora utilizzato?
    public function validatePublisher(Request $request){

        $validate = $request->validate([
            'id' => 'required',
        ]);
        try{
            DB::beginTransaction();

            $store = Store::find($request['id']);
            $valid = $store->user->isactive == 0 ? 1 : 0;
            if($request->filled('valid')){
                $valid = $request->input('valid');
            }
            $store->user->isvalid = $valid;
            $store->user->save();
            DB::commit();
            // INVIO NOTIFICA CORRETTA VALIDAZIONE
            return response(new SuccessResource(null));
        } catch (\Exception $exc) {
            DB::rollback();
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function activateAdmin(Request $request){

        $validate = $request->validate([
            'id' => 'required',
        ]);
        try{
            DB::beginTransaction();

            $admin = User::find($request['id']);
            $active = $admin->isactive == 0 ? 1 : 0;
            $valid = $admin->isvalid == 0 ? 1 : 0;
            if($request->filled('active')){
                $active = $request->input('active');
            }
            if($request->filled('valid')){
                $active = $request->input('valid');
            }
            $admin->isactive = $active;
            $admin->isvalid = $valid;
            $admin->save();
            DB::commit();
            return response(new SuccessResource(null));
        } catch (\Exception $exc) {
            DB::rollback();
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
    public function getPublisherByName($businessname = null, $active = null){
        try{
            if (!empty($businessname) || !empty($active)){
                $store = Store::with('user')->whereHas('user', function ($query) use ($active) {
                    $query->where('isactive', $active);
                })->where(DB::raw('UPPER(businessname)'), 'LIKE', '%'. strtoupper($businessname) .'%')->get(); //da controllare in caso di active a false
            }else {
                $store = Store::all();
            }
            if(count($store) == 0)
            {
                return response(null, \Illuminate\Http\Response::HTTP_NO_CONTENT);
            }
            return response(['publisher' => StoreSmallResource::collection($store)]);
        } catch (\Exception $exc) {
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * @OA\Get(
     *      path="/getpublisher/{id}",
     *      operationId="getPublisher",
     *      tags={"AdminController"},
     *      summary="Get publisher",
     *      description="Returns publisher from id",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          description="ID of publisher",
     *          in="path",
     *          name="id",
     *          required=true,
     *          example="sadf-dfasdf-234df-sfasdf",
     *              @OA\Schema(
     *                  type="string"
     *              )
     *      ),
     *      @OA\Response(
     *        response=200,
     *        description="Publisher info by id",
     *        @OA\JsonContent(
     *          @OA\Property(property="publisher", type="object",
     *              @OA\Property(property="businessname", type="string"),
     *              @OA\Property(property="vatnumber", type="string"),
     *              @OA\Property(property="nickname", type="string"),
     *              @OA\Property(property="latitude", type="string"),
     *              @OA\Property(property="longitude", type="string"),
     *              @OA\Property(property="atecocode", type="string"),
     *              @OA\Property(property="contacts", type="array", collectionFormat="multi",
     *                  @OA\Items(
     *                      @OA\Property(property="id", type="string"),
     *                      @OA\Property(property="typecode", type="string"),
     *                      @OA\Property(property="value", type="string"),
     *                  )
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
     * @param $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function getPublisher($id){
        try{
            $store = Store::find($id);
            if(empty($store))
            {
                return response(null, \Illuminate\Http\Response::HTTP_NO_CONTENT);
            }
            return response(['publisher' => new StoreResource($store)]);
        } catch (\Exception $exc) {
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * @OA\Get(
     *      path="/deleteregistration/{id}",
     *      operationId="deleteRegistration",
     *      tags={"AdminController"},
     *      summary="Delete user with publisher",
     *      description="Delete all information for user account and publisher",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          description="ID of publisher",
     *          in="path",
     *          name="id",
     *          required=true,
     *          example="10",
     *              @OA\Schema(
     *                  type="integer"
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
     *          response=401,
     *          description="Unauthenticated",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Unauthenticated")
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
    public function deleteRegistration($id){
        try{
            //DA SISTEMARE LA CANCELLAZIONE
            DB::beginTransaction();
            $store = Store::find($id);
            if(!empty($store->user->profilephoto->path)){
                    $path = getFullPathStorage($store->user->profilephoto->path);
                    if(!empty($path) && file_exists($path)) {
                        \File::delete($path);
                    }
                    $store->user->profilephoto->delete();
            }
            if(!empty($store->user->contacts)){
                foreach($store->user->contacts as $contact){
                    $contact->delete();
                }
            }
            $store->delete();
            $store->user->delete();
            DB::commit();
            return response(new SuccessResource(null));
        } catch (\Exception $exc) {
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function getMarks(){
        try{
            $marks = Mark::where('status', MarkStatusesEnum::PENDING)->paginate(20);
            if(empty($marks))
            {
                return response(null, \Illuminate\Http\Response::HTTP_NO_CONTENT);
            }
            else {
                return response(new RequestMarkPaginateResource($marks));
            }
        } catch (\Exception $exc) {
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    /* DA DEPRECARE la getmarks restituisce già tutto */
    public function getMarkDetail($marked){
        try{
            $marks = Mark::where('marked', $marked)->where('status', MarkStatusesEnum::PENDING)->paginate(20);
            if(empty($marks))
            {
                return response(null, \Illuminate\Http\Response::HTTP_NO_CONTENT);
            }
            return response(new RequestMarkPaginateResource($marks));
        } catch (\Exception $exc) {
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function manageUserBan(Request $request){
        $validate = $request->validate([
            'userid' => 'required',
        ]);
        try{
            DB::beginTransaction();
            $user = User::find($request->input('userid'));
            $user->isbanned = $user->isbanned == 0 ? 1 : 0;
            $user->save();
            DB::commit();
            if ($user->isbanned){
                $user->notify(new UserBannedNotification());
            }else{
                $user->notify(new UserUnBannedNotification());
            }
            return response(new SuccessResource(null));
        } catch (\Exception $exc) {
            DB::rollBack();
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function getActivePublishers(){
        try{
            $storesactive = Store::with('user')->whereHas('user', function ($query){
                $query->where('isactive', 1)
                      ->where('isvalid', 1)
                      ->where('isbanned', 0);
            })->paginate(20);
            if(empty($storesactive) || $storesactive->count() == 0){
                return response(null, \Illuminate\Http\Response::HTTP_NO_CONTENT);
            }
            return response(new StoreInactivePaginateCollectionResource($storesactive));
        }catch (\Exception $exc)
        {
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    /* insert nella tabella thunderdeals */
    public function saveThunderdeal(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required',
            'startdate' => 'required',
            'enddate' => 'required',
            'isactive' => 'required',
        ]);
        try{
            DB::beginTransaction();
            ThunderDeal::create($validate);
            DB::commit();
            return response(new SuccessResource(null));
        }catch (\Exception $exc)
        {
            DB::rollBack();
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    /* modifica del flag isactive dela riga nella tabella thunderdeal */
    public function deactivateThunderdeal(Request $request)
    {
        $validate = $request->validate([
            'id' => 'required',
        ]);
        try {
            DB::beginTransaction();
            $thunderdeal = ThunderDeal::find($request->input('id'));
            if(!empty($thunderdeal))
            {
                $thunderdeal->isactive = $thunderdeal->isactive == 1 ? 0 : 1;
                $thunderdeal->save();
                DB::commit();
                return response(new SuccessResource(null));
            }
            return response(null, \Illuminate\Http\Response::HTTP_NO_CONTENT);
        }catch (\Exception $exc)
        {
            DB::rollBack();
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    /* modifica della riGa nella tabella thunderdeal */
    public function editThunderdeal(Request $request)
    {
        $validate = $request->validate([
            'id' => 'required',
            'title' => 'required',
            'startdate' => 'required',
            'enddate' => 'required',
            'isactive' => 'required',
        ]);
        try {
            DB::beginTransaction();
            $thunderdeal =  ThunderDeal::find($request->input('id'));
            $thunderdeal->title = $request->input('title');
            $thunderdeal->startdate = $request->input('startdate');
            $thunderdeal->enddate = $request->input('enddate');
            $thunderdeal->isactive = $request->input('isactive');
            $thunderdeal->save();
            DB::commit();
            return response(new SuccessResource(null));
        }catch (\Exception $exc)
        {
            DB::rollBack();
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    /* lista dei thunderdeals */
    public function getThunderdealsList()
    {
        try {
            $thunderdeals =  ThunderDeal::orderBy('startdate', 'DESC')->orderBy('enddate', 'DESC')->paginate(20);
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

    public function getThunderDetail($thunderid)
    {
        try{
            $thunderdeal = ThunderDeal::find($thunderid);
            if(empty($thunderdeal))
            {
                return response(null, \Illuminate\Http\Response::HTTP_NO_CONTENT);
            }
            return response(['deal' => new ThunderDealResource($thunderdeal)]);
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
            $notifications = CustomNotification::where('userid', $userid)->paginate(20);
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
}
