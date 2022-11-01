<?php

namespace App\Jobs;

use App\Http\Service\OneSignalNotificationService;
use App\Models\CustomNotification;
use App\Models\NotificationAction;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CreateNotificationProcess implements ShouldQueue
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
            $notification = NotificationAction::where('type', $this->data['type'])->first();
            $req = array_merge($this->data, [
                'actionid' => $notification->id,
                'type' => $this->data['action'],
                'isread' => 0]);
            $saved  = CustomNotification::create($req);
            DB::commit();
            $this->oneSignalNotificationService->sendNotification($this->data);
        }catch (\Exception $exc)
        {
            DB::rollBack();
            Log::error($exc->getMessage());
        }
    }
}
