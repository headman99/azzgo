<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddShippingAddressesToRequests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('requestads', function (Blueprint $table) {
            $table->string('shippingaddress')->nullable();
        });

        Schema::table('requestshistory', function (Blueprint $table) {
            $table->string('shippingaddress')->nullable();
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
            $table->dropColumn('shippingaddress');
        });

        Schema::table('requestshistory', function (Blueprint $table) {
            $table->dropColumn('shippingaddress');
        });
    }
}
