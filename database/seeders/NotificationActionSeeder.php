<?php

namespace Database\Seeders;

use App\Enums\NotificationActionTypeEnum;
use App\Models\NotificationAction;
use Illuminate\Database\Seeder;

class NotificationActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        NotificationAction::create([
            'type' => NotificationActionTypeEnum::GOTO_REQUEST,
            'action' => ''
        ]);

        NotificationAction::create([
            'type' => NotificationActionTypeEnum::GOTO_AGENCY,
            'action' => ''
        ]);

        NotificationAction::create([
            'type' => NotificationActionTypeEnum::GOTO_PRODUCT,
            'action' => ''
        ]);

        NotificationAction::create([
            'type' => NotificationActionTypeEnum::GOTO_SIGNUP_REQUEST,
            'action' => ''
        ]);

    }
}
