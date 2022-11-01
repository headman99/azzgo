<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Removeconstraintandthunderdeals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('favourites', function (Blueprint $table) {
            $table->dropForeign(['productid']);
            $table->dropForeign(['userid']);
        });

        Schema::table('follows', function (Blueprint $table) {
            $table->dropForeign(['storeid']);
            $table->dropForeign(['userid']);
        });

        Schema::create('thunderdeals', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('startdate');
            $table->date('enddate');
            $table->boolean('isactive');
        });

        Schema::table('offers', function (Blueprint $table) {
            $table->foreignId('thunderid')->nullable()->constrained('thunderdeals');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('offers', function (Blueprint $table) {
            $table->dropConstrainedForeignId('thunderid');
        });

        Schema::dropIfExists('thunderdeals');

        Schema::table('favourites', function (Blueprint $table) {
            $table->foreignUuid('productid')->constrained('products');
            $table->foreignId('userid')->constrained('users');
        });

        Schema::table('follows', function (Blueprint $table) {
            $table->foreignUuid('storeid')->constrained('stores');
            $table->foreignId('userid')->constrained('users');
        });
    }
}
