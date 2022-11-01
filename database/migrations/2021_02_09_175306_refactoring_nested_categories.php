<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RefactoringNestedCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('stores', function (Blueprint $table) {
            $table->dropForeign(['atecocode']);
            $table->dropColumn('atecocode');
        });

        Schema::table('atecos', function (Blueprint $table) {
            $table->dropNestedSet();
            $table->dropPrimary('code');
        });

        Schema::table('atecos', function (Blueprint $table) {
            $table->id();
            $table->nestedSet();
        });

        Schema::table('atecos', function (Blueprint $table) {
            $table->string('code')->unique()->change();
        });

        Schema::table('stores', function (Blueprint $table) {
            $table->string('atecocode');
            $table->foreign('atecocode')->references('code')->on('atecos');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['categoryid']);
            $table->dropColumn('categoryid');
        });

        Schema::table('productcategories', function (Blueprint $table) {
            $table->dropPrimary('id');
            $table->dropColumn('id');
        });

        Schema::table('productcategories', function (Blueprint $table) {
            $table->id();
        });

        Schema::table('products', function (Blueprint $table) {
            $table->foreignId('categoryid')->constrained('productcategories');
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
            $table->dropConstrainedForeignId(['categoryid']);
        });

        Schema::table('productcategories', function (Blueprint $table) {
            $table->dropPrimary('id');
            $table->dropColumn('id');
        });

        Schema::table('productcategories', function (Blueprint $table) {
            $table->uuid('id')->primary();
        });

        Schema::table('products', function (Blueprint $table) {
            $table->foreignUuid('categoryid')->constrained('productcategories');
        });

        Schema::table('stores', function (Blueprint $table) {
            $table->dropForeign(['atecocode']);
            $table->dropColumn('atecocode');
        });

        Schema::table('atecos', function (Blueprint $table) {
            $table->string('code')->unique(false)->change();
        });

        Schema::table('atecos', function (Blueprint $table) {
            $table->dropPrimary('id');
            $table->dropColumn('id');
            $table->dropNestedSet();
        });

        Schema::table('atecos', function (Blueprint $table) {
            $table->string('code')->primary()->unique();
            $table->nestedSet();
        });

        Schema::table('stores', function (Blueprint $table) {
            $table->string('atecocode');
            $table->foreign('atecocode')->references('code')->on('atecos');
        });
    }
}
