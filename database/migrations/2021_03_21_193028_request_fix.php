<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RequestFix extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::dropIfExists('requests');

        Schema::create('requestads', function (Blueprint $table) {
            $table->uuid('requestcode')->primary()->unique();
            $table->uuid('publisherid');
            $table->uuid('productid');
            $table->foreign('publisherid')->references('id')->on('stores');
            $table->unsignedBigInteger('userid');
            $table->foreign('userid')->references('id')->on('users');
            $table->foreign('productid')->references('id')->on('products');
            $table->enum('status', ['A', 'P', 'D']);
            $table->integer('quantity')->default(1);
            $table->float('price', 8,2)->default(0);
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
