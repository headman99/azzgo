<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeCategoryStores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('storecategories', function (Blueprint $table){
           $table->string('code')->unique()->primary();
           $table->string('description');
        });

        Schema::table('stores', function (Blueprint $table) {
            $table->dropForeign(['atecocode']);
            $table->dropColumn('atecocode');
            $table->string('category');
            $table->foreign('category')->references('code')->on('storecategories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stores', function (Blueprint $table) {
            $table->dropForeign(['category']);
            $table->dropColumn('category');
            $table->string('atecocode');
            $table->foreign('atecocode')->references('code')->on('atecos');
        });

        Schema::dropIfExists('storecategories');
    }
}
