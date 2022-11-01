<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductTypeandRemoveAttach extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('marks', function (Blueprint $table) {
            $table->dropColumn('attachments');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->enum('type', \App\Enums\ProductTypeEnum::getValues())->default(\App\Enums\ProductTypeEnum::PRODUCT);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('type');
        });

        Schema::table('marks', function (Blueprint $table) {
            $table->text('attachments')->nullable();
        });
    }
}
