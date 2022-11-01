<?php

namespace App\Http\Controllers;

use App\Enums\ContactTypeEnum;
use App\Enums\CustomNotificationTypeEnum;
use App\Enums\NotificationActionTypeEnum;
use App\Enums\RolePermissionEnum;
use App\Http\Resources\AdminResource;
use App\Http\Resources\CustomerResource;
use App\Http\Resources\ErrorResource;
use App\Http\Resources\PhotoResource;
use App\Http\Resources\PreferenceResource;
use App\Http\Resources\PublisherResource;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\UserResource;
use App\Jobs\CreateNotificationProcess;
use App\Models\Contact;
use App\Models\Photo;
use App\Models\Preference;
use App\Models\Store;
use App\Models\User;
use App\Notifications\CustomerWelcomeNotification;
use App\Notifications\UserWelcomeNotification;
use Carbon\Carbon;
use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Str;
use PhpParser\Node\Expr\Empty_;
use Psr\Http\Message\ResponseInterface;

class AuthController extends Controller
{

    /**
     * @OA\Post(
     * path="/registerCustomer",
     * summary="Register user customer",
     * description="Register user customer",
     * operationId="registerCustomer",
     * tags={"AuthController"},
     * @OA\RequestBody(
     *    required=true,
     *    description="User credentials",
     *    @OA\JsonContent(
     *       required={"name", "email","password"},
     *       @OA\Property(property="name", type="string", example="user1"),
     *       @OA\Property(property="email", type="string", format="email", example="user1@mail.com"),
     *       @OA\Property(property="password", type="string", format="password", example="PassWord12345"),
     *       @OA\Property(property="consent1", type="boolean", example="1"),
     *       @OA\Property(property="consent2", type="boolean", example="0"),
     *       @OA\Property(property="consent3", type="boolean", example="1"),
     *       @OA\Property(property="consent4", type="boolean", example="1"),
     *    )
     * ),
     * @OA\Response(
     *    response=200,
     *    description="Success operation",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Salvataggio eseguito con successo")
     *    )
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
    public function registerCustomer(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:55',
            'email' => 'email|required|unique:users',
            'password' => 'required|confirmed',
            'phone' => 'required',
        ]);
        if (
            !$request->filled('consent1') ||
            !$request->filled('consent2') ||
            !$request->filled('consent3') ||
            !$request->filled('consent4')
        ) {
            $error = ['consenso' => 'Tutti i consensi devono essere accettati'];
            $newValidationErrors = new MessageBag($error);
            $message = [
                'message' => 'The given data was invalid.',
                'errors' => $newValidationErrors
            ];
            return response()->json($message, \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }


        try {
            DB::beginTransaction();
            $validatedData['password'] = bcrypt($request->password);
            $validatedData['isactive'] = 1;
            $validatedData['isvalid'] = 1;
            $validatedData['isbanned'] = 0;
            $validatedData['consent1'] = 1;
            $validatedData['consent2'] = 1;
            $validatedData['consent3'] = 1;
            $validatedData['consent4'] = 1;

            $user = User::create($validatedData);
            $user->assignRole(RolePermissionEnum::ROLE_CUSTOMER);
            $user->givePermissionTo(RolePermissionEnum::PERMISSION_CUSTOMER);

            //contacts
            Contact::create([
                'iduser' => $user->id,
                'typecode' => ContactTypeEnum::EMAIL,
                'value' => $request->input('email'),
            ]);

            Contact::create([
                'iduser' => $user->id,
                'typecode' => ContactTypeEnum::PHONE,
                'value' => $request->input('phone')
            ]);

            if ($request->filled('address')) {
                Contact::create([
                    'iduser' => $user->id,
                    'typecode' => ContactTypeEnum::ADDRESS,
                    'value' => $request->input('address')
                ]);
            }
            $loginData = $request->validate([
                'email' => 'email|required',
                'password' => 'required'
            ]);
            //$user->notify(new UserWelcomeNotification($request->email,$request->password));
            //return response(['user' => new CustomerResource($user)]);
            DB::commit();
            return response(new SuccessResource(null));
        } catch (\Exception $exc) {
            DB::rollback();
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * @OA\Post(
     * path="/registerPublisher",
     * summary="Register publisher role",
     * description="Register user with publisher role",
     * operationId="registerPublisher",
     * tags={"AuthController"},
     * @OA\RequestBody(
     *    required=true,
     *    description="User credentials for publisher",
     *    @OA\JsonContent(
     *       required={"name", "businessname", "vatnumber", "email","password", "phone", "category", "latitude", "longitude"},
     *       @OA\Property(property="email", type="string", format="email", example="user1@mail.com"),
     *       @OA\Property(property="password", type="string", format="password", example="PassWord12345"),
     *       @OA\Property(property="name", type="string"),
     *       @OA\Property(property="businessname", type="string"),
     *       @OA\Property(property="vatnumber", type="string"),
     *       @OA\Property(property="phone", type="string"),
     *       @OA\Property(property="category", type="string"),
     *       @OA\Property(property="latitude", type="string"),
     *       @OA\Property(property="longitude", type="string"),
     *       @OA\Property(property="consent1", type="boolean", example="1"),
     *       @OA\Property(property="consent2", type="boolean", example="0"),
     *       @OA\Property(property="consent3", type="boolean", example="1"),
     *       @OA\Property(property="consent4", type="boolean", example="1"),
     *    )
     * ),
     * @OA\Response(
     *          response=200,
     *          description="User info",
     *          @OA\JsonContent(
     *              @OA\Property(property="name", type="string"),
     *              @OA\Property(property="email", type="string"),
     *              @OA\Property(property="surname", type="string"),
     *              @OA\Property(property="isactive", type="boolean", example="1"),
     *              @OA\Property(property="isvalid", type="boolean", example="0"),
     *              @OA\Property(property="isbanned", type="boolean", example="1"),
     *              @OA\Property(property="roles", type="string", example="Publisher"),
     *              @OA\Property(property="store", type="object",
     *                      @OA\Property(property="businessname", type="string"),
     *                      @OA\Property(property="vatnumber", type="string"),
     *                      @OA\Property(property="nickname", type="string"),
     *                      @OA\Property(property="latitude", type="string"),
     *                      @OA\Property(property="longitude", type="string"),
     *                      @OA\Property(property="atecocode", type="string"),
     *                      @OA\Property(property="contacts", type="array", collectionFormat="multi",
     *                          @OA\Items(
     *                              @OA\Property(property="id", type="string"),
     *                              @OA\Property(property="typecode", type="string"),
     *                              @OA\Property(property="value", type="string"),
     *                          )
     *                      )
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
    public function registerPublisher(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:55',
            'businessname' => 'required|max:55',
            'vatnumber' => 'required',
            'email' => 'email|required|unique:users',
            'password' => 'required|confirmed',
            'phone' => 'required',
            'category' => 'required',
        ]);

        if (
            !$request->filled('consent1') ||
            !$request->filled('consent2') ||
            !$request->filled('consent3') ||
            !$request->filled('consent4')
        ) {
            $error = ['consenso' => 'Tutti i consensi devono essere accettati'];
            $newValidationErrors = new MessageBag($error);
            $message = [
                'message' => 'The given data was invalid.',
                'errors' => $newValidationErrors
            ];
            return response()->json($message, \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }

        if (
            !$request->filled('latitude') &&
            !$request->filled('longitude')
        ) {
            $error = ['indirizzo' => 'L\'indirizzo è obbligatorio'];
            $newValidationErrors = new MessageBag($error);
            $message = [
                'message' => 'The given data was invalid.',
                'errors' => $newValidationErrors
            ];
            return response()->json($message, \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }

        try {
            DB::beginTransaction();
            $validatedData['password'] = bcrypt($request->password);
            $validatedData['isactive'] = 0;
            $validatedData['isvalid'] = 0;
            $validatedData['isbanned'] = 0;
            $validatedData['latitude'] = $request->input('latitude');
            $validatedData['longitude'] = $request->input('longitude');
            $validatedData['consent1'] = 1;
            $validatedData['consent2'] = 1;
            $validatedData['consent3'] = 1;
            $validatedData['consent4'] = 1;

            $user = array_merge($validatedData, ['fiscalcode' => $request->input('vatnumber')]);
            $user = User::create($user);
            $user->assignRole(RolePermissionEnum::ROLE_PUBLISHER);
            $user->givePermissionTo(RolePermissionEnum::PERMISSION_PUBLISHER);

            $store = array_merge($validatedData, ['iduser' => $user->id, 'nickname' => $request->input('name'), 'categorycode' => $request->input('category')]);
            Store::create($store);

            //contacts
            Contact::create([
                'iduser' => $user->id,
                'typecode' => ContactTypeEnum::EMAIL,
                'value' => $request->input('email')
            ]);

            Contact::create([
                'iduser' => $user->id,
                'typecode' => ContactTypeEnum::PHONE,
                'value' => $request->input('phone')
            ]);

            if ($request->filled('address')) {
                Contact::create([
                    'iduser' => $user->id,
                    'typecode' => ContactTypeEnum::ADDRESS,
                    'value' => $request->input('address')
                ]);
            }

            DB::commit();

            $user->notify(new UserWelcomeNotification($request->email, $request->password));
            $useradmin = User::role(RolePermissionEnum::ROLE_ADMIN)->first();
            
            $data = [
                'title' => 'Un azienda ha richiesto di iscriversi ad AzzGo',
                'description' => 'Vai alle richieste di registrazione',
                'userid' => $useradmin->id,
                'action' => CustomNotificationTypeEnum::NEW_REQUEST_SIGNUP,
                'type' => NotificationActionTypeEnum::GOTO_SIGNUP_REQUEST
            ];
            CreateNotificationProcess::dispatch($data);
            return response(['user' => new PublisherResource($user)]);
        } catch (\Exception $exc) {
            DB::rollback();
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * @OA\Post(
     * path="/registerAdmin",
     * summary="Register admin role",
     * description="Register user with admin role",
     * operationId="registerAdmin",
     * tags={"AuthController"},
     * @OA\RequestBody(
     *    required=true,
     *    description="User credentials for admin",
     *    @OA\JsonContent(
     *       required={"name", "email","password"},
     *       @OA\Property(property="name", type="string"),
     *       @OA\Property(property="email", type="string", format="email", example="user1@mail.com"),
     *       @OA\Property(property="password", type="string", format="password", example="PassWord12345"),
     *       @OA\Property(property="consent1", type="boolean", example="1"),
     *       @OA\Property(property="consent2", type="boolean", example="0"),
     *       @OA\Property(property="consent3", type="boolean", example="1"),
     *       @OA\Property(property="consent4", type="boolean", example="1"),
     *    )
     * ),
     * @OA\Response(
     *          response=200,
     *          description="User info",
     *          @OA\JsonContent(
     *              @OA\Property(property="name", type="string"),
     *              @OA\Property(property="email", type="string"),
     *              @OA\Property(property="surname", type="string"),
     *              @OA\Property(property="isactive", type="boolean", example="1"),
     *              @OA\Property(property="isvalid", type="boolean", example="0"),
     *              @OA\Property(property="isbanned", type="boolean", example="1"),
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
    public function registerAdmin(Request $request)
    {
        // todo need test and copy like regster publisher
        $validatedData = $request->validate([
            'name' => 'required|max:55',
            'email' => 'email|required|unique:users',
            'password' => 'required|confirmed',
            'consent1' => 'required',
            'consent2' => 'required',
            'consent3' => 'required',
            'consent4' => 'required',
        ]);

        try {
            DB::beginTransaction();
            $validatedData['password'] = bcrypt($request->password);
            $validatedData['isactive'] = 0;
            $validatedData['isvalid'] = 0;
            $validatedData['isbanned'] = 0;

            $user = User::create($validatedData);
            $user->assignRole(RolePermissionEnum::ROLE_ADMIN);
            $user->givePermissionTo(RolePermissionEnum::PERMISSION_ADMIN);

            DB::commit();
            return response(['user' => new AdminResource($user)]);
        } catch (\Exception $exc) {
            DB::rollback();
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * @OA\Post(
     * path="/login",
     * summary="Sign in",
     * description="Login by email, password",
     * operationId="login",
     * tags={"AuthController"},
     * @OA\RequestBody(
     *    required=true,
     *    description="Pass user credentials",
     *    @OA\JsonContent(
     *       required={"email","password"},
     *       @OA\Property(property="email", type="string", format="email", example="user1@mail.com"),
     *       @OA\Property(property="password", type="string", format="password", example="PassWord12345"),
     *    )
     * ),
     * @OA\Response(
     *          response=200,
     *          description="User info and token",
     *          @OA\JsonContent(
     *              @OA\Property(property="access_token", type="string", example="mnwekrjbkj4534k5jj45k3jb5kj3b..."),
     *              @OA\Property(property="name", type="string"),
     *              @OA\Property(property="email", type="string"),
     *              @OA\Property(property="surname", type="string"),
     *              @OA\Property(property="isactive", type="boolean", example="1"),
     *              @OA\Property(property="isvalid", type="boolean", example="0"),
     *              @OA\Property(property="isbanned", type="boolean", example="1"),
     *              @OA\Property(property="roles", type="string", example="Publisher"),
     *              @OA\Property(property="store", type="object",
     *                      @OA\Property(property="businessname", type="string"),
     *                      @OA\Property(property="vatnumber", type="string"),
     *                      @OA\Property(property="nickname", type="string"),
     *                      @OA\Property(property="latitude", type="string"),
     *                      @OA\Property(property="longitude", type="string"),
     *                      @OA\Property(property="atecocode", type="string"),
     *                      @OA\Property(property="contacts", type="array", collectionFormat="multi",
     *                          @OA\Items(
     *                              @OA\Property(property="id", type="string"),
     *                              @OA\Property(property="typecode", type="string"),
     *                              @OA\Property(property="value", type="string"),
     *                          )
     *                      )
     *              )
     *          )
     * ),
     * @OA\Response(
     *    response=401,
     *    description="Invalid Credentials",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Invalid Credentials")
     *        )
     *     )
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
    public function login(Request $request)
    {
        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);
        try {
            if (!auth()->attempt($loginData)) {
                return response(['message' => 'Credenziali non valide'], \Illuminate\Http\Response::HTTP_UNAUTHORIZED);
            }
            $user = auth()->user();
            if ($user->isactive == 0) {
                return response(['message' => 'Utente non attivo'], \Illuminate\Http\Response::HTTP_UNAUTHORIZED);
            }

            if ($user->isvalid == 0) {
                return response(['message' => 'Utente non valido'], \Illuminate\Http\Response::HTTP_UNAUTHORIZED);
            }

            if ($user->isbanned == 1) {
                return response(['message' => 'Utente bannato'], \Illuminate\Http\Response::HTTP_UNAUTHORIZED);
            }

            /*
            if($user->hasRole([RolePermissionEnum::ROLE_CUSTOMER])){
                return response(['message' => 'Al momento questa applicazione è disponibile solo per i negozi, presto verrà resa disponibile per tutti gli utenti. '], \Illuminate\Http\Response::HTTP_UNAUTHORIZED);
            }*/

            $accessToken = auth()->user()->createToken('authToken')->accessToken;
            return response(['user' => new UserResource($user), 'access_token' => $accessToken]);
        } catch (\Exception $exc) {
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * @OA\Post(
     * path="/logout",
     * summary="Sign out",
     * description="Logout",
     * operationId="logout",
     * tags={"AuthController"},
     * security={ {"bearer": {} }},
     * @OA\Response(
     *          response=200,
     *          description="User info and token",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Logout success")
     *          )
     * ),
     * @OA\Response(
     *    response=401,
     *    description="Invalid Credentials",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Invalid Credentials")
     *    )
     * ),
     * @OA\Response(
     *          response=400,
     *          description="Impossibile eseguire operazione",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Impossibile eseguire operazione"),
     *              @OA\Property(property="error", type="string", example="Errore generico"),
     *          )
     *  )
     * )
     */
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        try {
            $request->user()->tokens()->delete();
            return response(['message' => "Logout success"]);
        } catch (\Exception $exc) {
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function profilePhoto(Request $request)
    {
        $validate = $request->validate([
            'file' => 'required|max:6144',
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
            if (!File::exists($rootDocumento)) {
                File::makeDirectory($rootDocumento, 0777, true);
            }
            if ($request->input('ismain') == 1) {
                $photos = Photo::where('extid', $request->input('extid'))->where('extidtype', $request->input('extidtype'))->where('ismain', 1)->get();
                if (!empty($photos)) {
                    foreach ($photos as $photo) {
                        $photo->delete();
                        $pathAndFile = getFullPathStorage($photo->path);
                        if (!empty($pathAndFile) && file_exists($pathAndFile)) {
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
        } catch (\Exception $exc) {
            DB::rollback();
            // delete file if rollback
            if (!empty($rootDocumento) && file_exists($rootDocumento . $fileName)) {
                File::delete($rootDocumento . $fileName);
            }
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    //Imposta una foto come tema
    public function themePhoto(Request $request)
    {
        $validate = $request->validate([
            'file' => 'required|max:6144',
            'extidtype' => 'required',
            'ismain' => 'required',
        ]);
        try {
            DB::beginTransaction();
            $userid = Auth::user()->id;
            $uuid = Str::uuid()->toString();
            $filextension = $request->file('file')->getClientOriginalExtension();
            $fileName = $uuid . $filextension;

            $relativePath = getPathPublic() . getPathDocumenti() . $userid . '/';
            $rootDocumento =  getFullPathStorage($relativePath);
            if (!File::exists($rootDocumento)) {
                File::makeDirectory($rootDocumento, 0777, true);
            }
            if ($request->input('ismain') == 1) {
                $photos = Photo::where('extid', $userid)->where('extidtype', $request->input('extidtype'))->where('ismain', 1)->get();
                if (!empty($photos)) {
                    foreach ($photos as $photo) {
                        $photo->delete();
                        $pathAndFile = getFullPathStorage($photo->path);
                        if (!empty($pathAndFile) && file_exists($pathAndFile)) {
                            File::delete($pathAndFile);
                        }
                    }
                }
            }

            $photo = Photo::create([
                'extidtype' => $request->input('extidtype'),
                'extid' => strval($userid),
                'path' => $relativePath . $fileName,
                'ismain' => $request->input('ismain'),
            ]);

            $row = Preference::where('iduser', '=', $userid)->first();
            if (empty($row)) {
                Preference::create([
                    'iduser' => $userid,
                    'type' => 'theme',
                    'value' => $relativePath . $fileName,
                    'isImage' => true
                ]);
            } else {

                $row->update([
                    'value' => $relativePath . $fileName,
                    'isImage' => true
                ]);
            }


            DB::commit();
            request()->file->move($rootDocumento, $fileName);
            return response(['photo' => new PhotoResource($photo)]);
        } catch (\Exception $exc) {
            DB::rollback();
            // delete file if rollback
            if (!empty($rootDocumento) && file_exists($rootDocumento . $fileName)) {
                File::delete($rootDocumento . $fileName);
            }
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function onesignalUpdatePlayerId($playerid)
    {
        try {
            DB::beginTransaction();
            $user = auth()->user();
            $userupdate = User::find($user->id);
            $userupdate->update(['palyerid' => $playerid]);
            DB::commit();
            return response(['message' => "Update ok"]);
        } catch (\Exception $exc) {
            DB::rollback();
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function getPreferences()
    {
        try {
            DB::beginTransaction();
            $userid = Auth::user()->id;
            $preference = Preference::where('iduser', '=', $userid)->first();
            if (empty($preference)) {
                return response(null, \Illuminate\Http\Response::HTTP_NO_CONTENT);
            }
            DB::commit();
            return response(['preference' => new PreferenceResource($preference)]);
        } catch (\Exception $exc) {
            DB::rollback();
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    //Imposta un tema colorato
    public function setPreferences(Request $request)
    {
        $validateData = $request->validate([
            'type' => 'required',
            'value' => 'required'
        ]);

        try {
            DB::beginTransaction();
            $userid = Auth::user()->id;
            $preference = Preference::where('iduser', '=', $userid)->first();
            if (empty($preference)) {
                $preference = Preference::create(array_merge(
                    [
                        'iduser' => $userid,
                        'isImage' => false
                    ],
                    $validateData
                ));
            } else {
                if ($preference->isImage) {
                    $photos = Photo::where('extid', $userid)->where('extidtype', 'T')->where('ismain', 1)->get();
                    if (!empty($photos)) {
                        foreach ($photos as $photo) {
                            $photo->delete();
                            $pathAndFile = getFullPathStorage($photo->path);
                            if (!empty($pathAndFile) && file_exists($pathAndFile)) {
                                File::delete($pathAndFile);
                            }
                        }
                    }
                }

                $validateData['isImage'] = false;
                $preference->update($validateData);
            }

            DB::commit();
            return response(new PreferenceResource(($preference)));
        } catch (\Exception $exc) {
            DB::rollback();
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }
    public function deletePreferences()
    {
        try {
            DB::beginTransaction();
            $userid = Auth::user()->id;
            $preference = Preference::where('iduser', '=', $userid)->first();
            if (!empty($preference)) {
                if ($preference->isImage) {
                    $photos = Photo::where('extid', $userid)->where('extidtype', 'T')->where('ismain', 1)->get();
                    if (!empty($photos)) {
                        foreach ($photos as $photo) {
                            $photo->delete();
                            $pathAndFile = getFullPathStorage($photo->path);
                            if (!empty($pathAndFile) && file_exists($pathAndFile)) {
                                File::delete($pathAndFile);
                            }
                        }
                    }
                }
                $preference->delete();
            }



            DB::commit();
            return response(new PreferenceResource($preference));
        } catch (\Exception $exc) {
            DB::rollback();
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function sendVerificationMail(Request $request)
    {
        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        try {
            DB::beginTransaction();
            $user = User::where("email","=",$request->email)->first();
            if(!password_verify($request->password, $user->password)){
                return response(['message' => 'Credenziali non valide'], \Illuminate\Http\Response::HTTP_UNAUTHORIZED);
            }
            if (empty($user->email_verified_at) || is_null($user->email_varified_at)) {
                Mail::send('email.emailVerificationEmail', ['email' => Crypt::encrypt($user->email), 'name' => $user->name], function ($message) use ($user) {
                    $message->to($user->email);
                    $message->subject('Verifica Mail');
                });
            }
            DB::commit();
            return response(['result' => 1, 'message' => 'La mail è stata inviata,controlla la casella di posta']);
        } catch (\Exception $exc) {
            DB::rollBack();
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function verifyAccount($email)
    {
        try {
            DB::beginTransaction();
            $message = 'La tua email non esiste oppure non puo essere verificata.';
            $result = 0;
            $user = User::where('email', Crypt::decrypt($email))->first();
            if (!empty($user)) {
                if (!$user->email_verified_at) {
                    $user->update([
                        'email_verified_at' => Carbon::now()
                    ]);
                    $message = "La tua mail è stata verificata con successo.";
                    $result = 1;
                } else {
                    $message = "La tua mail è gia stata verificata.";
                    $result = "-1";
                }
            }
            DB::commit();
            return view('email.notifyEmailConfirmation', ['message' => $message, 'result' => $result]);
        } catch (\Exception $exc) {
            DB::rollback();
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function getUserInfo()
    {
        try {
            DB::beginTransaction();
            $userid = Auth::user()->id;
            $user = User::where('id', $userid)->first();
            DB::commit();
            return response(new UserResource($user));
        } catch (\Exception $exc) {
            DB::rollback();
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function checkEmailVerified(Request $request)
    {
        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        try{
            $user = User::where("email","=",$request->email)->first();
            if(!$user){
                return response(['message' => 'Credenziali non valide'], \Illuminate\Http\Response::HTTP_UNAUTHORIZED);
            }
            if(!password_verify($request->password, $user->password)){
                return response(['message' => 'Credenziali non valide'], \Illuminate\Http\Response::HTTP_UNAUTHORIZED);
            }
            $useradmin = User::role(RolePermissionEnum::ROLE_ADMIN)->first();
            if($useradmin->id == $user->id){
                return response(1);
            }
            $verified = isset($user->email_verified_at)?true:false;
            return response($verified);
        }catch (\Exception $exc) {
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }
}
