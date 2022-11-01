<?php


namespace App\Http\Service;


use App\Models\User;
use Berkayk\OneSignal\OneSignalFacade;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;

class OneSignalNotificationService
{


    public function sendNotification($data)
    {
        try
        {
            if(!empty($data['userid']))
            {
                $user = User::find($data['userid']);
                $playerid = $user->palyerid;
                if(!empty($playerid))
                {
                    $params = [];
                    $params['include_player_ids'] = [$playerid];
                    $contents = [
                        "it" => $data['title'] . ' ' . $data['description'],
                        "en" => $data['title'] . ' ' . $data['description']
                    ];
                    $params['contents'] = $contents;
//                    OneSignalFacade::sendNotificationCustom($params);
                    $message = $data['title'] . ' ' . $data['description'];
                    OneSignalFacade::sendNotificationToUser($message, $playerid, null , $data);
                }
            }
        }catch (\Exception $exc)
        {
            Log::error($exc->getMessage());
        }

    }
}
