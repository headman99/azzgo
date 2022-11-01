<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Renamecategoryforeign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('stores', function (Blueprint $table){
            $table->dropForeign(['category']);
            $table->renameColumn('category', 'categorycode');
            $table->foreign('categorycode')
                ->references('code')
                ->on('storecategories');
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
