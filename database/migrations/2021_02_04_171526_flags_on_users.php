<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FlagsOnUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('isactive')->default(0)->change();
            $table->boolean('isbanned')->default(0);
            $table->boolean('isvalid')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('isactive')->default(1)->change();
            $table->dropColumn('isbanned');
            $table->dropColumn('isvalid');
        });
    }
}
