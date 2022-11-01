<?php

namespace App\Http\Controllers;

use App\Http\Resources\ErrorResource;
use App\Http\Resources\ProductPaginatedResource;
use App\Http\Resources\SearchProductPaginateResource;
use App\Http\Resources\StorePaginateResource;
use App\Models\Product;
use App\Models\Store;
use Berkayk\OneSignal\OneSignalFacade;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PublicController extends Controller
{
    public function searchProducts(Request $request)
    {
        $validatedData = $request->validate([
            'latitude' => 'required',
            'longitude' => 'required',
        ],
            [
                'latitude.required' => 'L\'indirizzo è obbligatorio!',
                'longitude.required' => ''
            ]);
        try {
            config(['database.connections.mysql.strict' => false]);
            DB::reconnect();
            $latitude = $request->input('latitude');
            $longitude = $request->input('longitude');
            $distance = 5;
            $stores = Store::selectRaw('id, ( 6371 * acos( cos( radians(?) ) * cos( radians( stores.latitude ) ) * cos( radians( stores.longitude ) - radians(?) ) + sin( radians(?) ) * sin( radians( stores.latitude ) ) ) ) AS distance ', [$latitude, $longitude,  $latitude])
            ->when($request->filled('longitude') && $request->filled('latitude'), function ($query) use ($request, $distance) {
                return $query->havingRaw('distance < ?', [$distance])
                             ->when($request->filled('categoryid'), function ($query) use ($request) {
                                    return $query->where('categorycode', "{$request->input('categoryid')
                             }");
                    });
            })->inRandomOrder()->pluck('id');
            $products = Product::where("id", "0")->get();
            foreach ($stores as $store){
                $product = Product::selectRaw('id, type, storeid, title, description, ispublished ')->where('storeid', $store)
                    ->when($request->filled('testo'), function ($query) use ($request) {
                        return $query->whereRaw(' ( title LIKE ? OR description LIKE ? )', ["%{$request->input('testo')}%", "%{$request->input('testo')}%"]);
                    })->orderBy('updated_at', 'desc')->first();
                if(!empty($product)){
                    $products->push($product);
                }
            }
            $prods = new Product();
            $prods = $this->paginate($products, 10);

            if($prods->isEmpty())
            {
                return response(null, \Illuminate\Http\Response::HTTP_NO_CONTENT);
            }
            return response(new SearchProductPaginateResource($prods));
        }catch (\Exception $exc)
        {
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        } finally {
            config(['database.connections.mysql.strict' => true]);
            DB::reconnect();
        }
    }

    public function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public function searchPublisherByCategoryId(Request $request)
    {
        $validate = $request->validate([
            'categorycode' => 'required',
        ]);
        try {

            $stores = Store::with('user')->whereHas('user', function ($q)
            {
                $q->where('isactive', 1)
                    ->where('isbanned', 0);
            })->where('categorycode', $request->input('categorycode'))->paginate(20);
            if(empty($stores))
            {
                return response(null, \Illuminate\Http\Response::HTTP_NO_CONTENT);
            }
            return response(new StorePaginateResource($stores));
        }catch (\Exception $exc)
        {
            Log::error($exc->getMessage());
            return response(new ErrorResource($exc), \Illuminate\Http\Response::HTTP_BAD_REQUEST);
        }
    }

    public function sendNotification()
    {
        $params = [];
        $params['include_player_ids'] = ['f95b45d7-4340-4bbc-b577-6a327d8f5cee'];
        $contents = [
            "it" => 'Messaggio di prova',
            "en" => 'Test message'
        ];
        $params['contents'] = $contents;
        $data = [
            'title' => 'E stata accettata la tua richiesta',
            'description' => 'Vai alle tue richieste',
            'userid' => 'un user id'];

        OneSignalFacade::sendNotificationCustom($params);
//        OneSignalFacade::sendNotificationToUser("Messaggio di prova", 'f95b45d7-4340-4bbc-b577-6a327d8f5cee', null , $data);// sendNotificationCustom($params);
    }


}
