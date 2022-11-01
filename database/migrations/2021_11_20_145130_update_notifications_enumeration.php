<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\NotificationActionTypeEnum;
use App\Enums\CustomNotificationTypeEnum;

class UpdateNotificationsEnumeration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notificationactions', function (Blueprint $table) {
            $table->enum('type',NotificationActionTypeEnum::getValues())->change();
        });

        Schema::table('customnotifications', function (Blueprint $table) {
            $table->enum('type',CustomNotificationTypeEnum::getValues())->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
