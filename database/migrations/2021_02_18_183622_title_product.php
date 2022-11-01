<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TitleProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function ($table) {
            $table->string('title');
            $table->boolean('ispublished')->default(0);
        });

        Schema::table('pricelists', function ($table) {
            $table->date('startdate')->nullable()->change();
            $table->date('endate')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pricelists', function ($table) {
            $table->date('startdate')->nullable(false);
            $table->date('endate')->nullable(false);
        });

        Schema::table('products', function ($table) {
            $table->dropColumn('title');
            $table->dropColumn('ispublished');
        });
    }
}
