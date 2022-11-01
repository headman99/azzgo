<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NullProductCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function ($table) {
            $table->dropForeign(['categoryid']);
        });

        Schema::table('products', function ($table) {
            $table->dropColumn('categoryid');
        });

        Schema::table('products', function ($table) {
            $table->foreignId('categoryid')->nullable()->constrained('productcategories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function ($table) {
            $table->dropForeign(['categoryid']);
        });

        Schema::table('products', function ($table) {
            $table->dropColumn('categoryid');
        });

        Schema::table('products', function ($table) {
            $table->foreignId('categoryid')->constrained('productcategories');
        });
    }
}
