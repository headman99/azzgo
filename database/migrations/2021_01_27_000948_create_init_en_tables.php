<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInitEnTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('isactive')->default(1);
            $table->string('surname');
            $table->string('fiscalcode');
        });

        Schema::create('stores', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('iduser')->constrained('users');
            $table->string('businessname');
            $table->string('vatnumber');
            $table->string('nickname');
            $table->string('latitute');
            $table->string('longitude');
            $table->timestamps();
        });

        Schema::create('contactypes', function (Blueprint $table) {
            $table->string('typecode')->primary()->unique();
            $table->string('description');
            $table->integer('order');
        });

        Schema::create('contacts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('iduser')->constrained('users');
            $table->string('typecode');
            $table->string('value');
            $table->foreign('typecode')->references('typecode')->on('contactypes');
            $table->timestamps();
        });

        Schema::create('productcategories', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('description');
            $table->timestamps();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('storeid')->constrained('stores');
            $table->foreignUuid('categoryid')->constrained('productcategories');
            $table->string('description');
            $table->timestamps();
        });

        Schema::create('pricelists', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('productid')->constrained('products');
            $table->float('price',8,2);
            $table->date('startdate');
            $table->date('endate');
            $table->timestamps();
        });

        Schema::create('offers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('pricelistid')->constrained('pricelists');
            $table->date('startdate');
            $table->date('endate');
            $table->float('price',8,2);
            $table->timestamps();
        });

        Schema::create('warehouses', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('productid')->constrained('products');
            $table->integer('quantity');
            $table->timestamps();
        });

        Schema::create('photos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->enum('extidtype', ['A', 'U', 'P']);
            $table->uuid('extid');
            $table->string('path');
            $table->boolean('ismain');
            $table->timestamps();
        });

        Schema::create('reviews', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->enum('reviewertype', ['A', 'U']);
            $table->uuid('reviewerid');
            $table->enum('referencedtype', ['A', 'U']);
            $table->uuid('referencedid');
            $table->string('description');
            $table->boolean('isapproved');
            $table->integer('valutation');
            $table->timestamps();
        });

        Schema::create('favourites', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('productid')->constrained('products');
            $table->foreignId('userid')->constrained('users');
            $table->timestamps();
        });

        Schema::create('follows', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('storeid')->constrained('stores');
            $table->foreignId('userid')->constrained('users');
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
        Schema::dropIfExists('follows');
        Schema::dropIfExists('favourites');
        Schema::dropIfExists('reviews');
        Schema::dropIfExists('photos');
        Schema::dropIfExists('warehouses');
        Schema::dropIfExists('offers');
        Schema::dropIfExists('pricelists');
        Schema::dropIfExists('products');
        Schema::dropIfExists('productcategories');
        Schema::dropIfExists('contacts');
        Schema::dropIfExists('contactypes');
        Schema::dropIfExists('stores');

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('isactive');
            $table->dropColumn('surname');
            $table->dropColumn('fiscalcode');
        });

    }
}
