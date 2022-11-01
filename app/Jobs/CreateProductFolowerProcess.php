<?php

namespace App\Jobs;

use App\Http\Service\OneSignalNotificationService;
use App\Models\CustomNotification;
use App\Models\Follow;
use App\Models\NotificationAction;
use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CreateProductFolowerProcess implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;
    public $oneSignalNotificationService;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
        $this->oneSignalNotificationService = new OneSignalNotificationService();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            DB::beginTransaction();
            $product = Product::find($this->data['productid']);
            $followers = Follow::where('storeid', $product->storeid)->get();
            $notification = NotificationAction::where('type', $this->data['type'])->first();
            foreach ($followers as $follower)
            {
                $req = array_merge($this->data, [
                    'actionid' => $notification->id,
                    'type' => $this->data['action'],
                    'userid' => $follower->userid,
                    'isread' => 0]);
                $saved  = CustomNotification::create($req);
            }
            DB::commit();
            foreach ($followers as $follower)
            {
                $dataMerge = array_merge($this->data, ['userid' => $follower->userid]);
                $this->oneSignalNotificationService->sendNotification($dataMerge);
            }

        }catch (\Exception $exc)
        {
            DB::rollBack();
            Log::error($exc->getMessage());
        }
    }
}
