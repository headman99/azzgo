<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PrivacyConsentAndFlagOffer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function ($table) {
            $table->boolean('consent1')->default(0);
            $table->boolean('consent2')->default(0);
            $table->boolean('consent3')->default(0);
            $table->boolean('consent4')->default(0);
        });

        Schema::table('offers', function ($table) {
            $table->boolean('isactive')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('offers', function ($table) {
            $table->dropColumn('isactive');
        });

        Schema::table('users', function ($table) {
            $table->dropColumn('consent1');
            $table->dropColumn('consent2');
            $table->dropColumn('consent3');
            $table->dropColumn('consent4');
        });
    }
}
