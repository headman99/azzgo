<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NotificationTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notificationactions', function (Blueprint $table) {
            $table->id('id');
            $table->enum('type',[\App\Enums\NotificationActionTypeEnum::GOTO_REQUEST]);
            $table->string('action');
        });

        Schema::create('customnotifications', function (Blueprint $table) {
            $table->uuid('notificationid')->primary()->unique();
            $table->enum('type',[\App\Enums\CustomNotificationTypeEnum::REQUEST_DENIED,
                \App\Enums\CustomNotificationTypeEnum::REQUEST_ARRIVED,
                \App\Enums\CustomNotificationTypeEnum::REQUEST_ACCEPTED]); // da capire quali tipi settare
            $table->foreignId('userid')->constrained('users');
            $table->foreignId('actionid')->constrained('notificationactions');
            $table->string('title');
            $table->string('description');
            $table->boolean('isread');
            $table->timestamps();
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
