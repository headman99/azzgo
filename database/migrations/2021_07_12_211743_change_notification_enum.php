<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeNotificationEnum extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notificationactions', function (Blueprint $table) {
            $table->dropColumn('type');
        });

        Schema::table('customnotifications', function (Blueprint $table) {
            $table->dropColumn('type');
        });

        Schema::table('notificationactions', function (Blueprint $table) {
            $table->enum('type',[\App\Enums\NotificationActionTypeEnum::GOTO_REQUEST]);
        });

        Schema::table('customnotifications', function (Blueprint $table) {
            $table->enum('type',[\App\Enums\CustomNotificationTypeEnum::REQUEST_DENIED,
                \App\Enums\CustomNotificationTypeEnum::REQUEST_ARRIVED,
                \App\Enums\CustomNotificationTypeEnum::REQUEST_ACCEPTED]);
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
