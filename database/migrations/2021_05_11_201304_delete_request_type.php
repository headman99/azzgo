<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteRequestType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('requestads', function (Blueprint $table) {
            $table->dropColumn('requestype');
        });

        Schema::table('requestshistory', function (Blueprint $table) {
            $table->dropColumn('requestype');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('requestads', function (Blueprint $table) {
            $table->enum('requestype', \App\Enums\RequestTypeEnum::getValues())->default(\App\Enums\RequestTypeEnum::PRODUCT);
        });

        Schema::table('requestshistory', function (Blueprint $table) {
            $table->enum('requestype', \App\Enums\RequestTypeEnum::getValues())->default(\App\Enums\RequestTypeEnum::PRODUCT);
        });
    }
}
