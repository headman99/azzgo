<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtecoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atecos', function (Blueprint $table) {
            $table->string('code')->primary()->unique();
            $table->string('description');
            $table->nestedSet();
        });


        Schema::table('stores', function (Blueprint $table) {
            $table->string('atecocode');
            $table->foreign('atecocode')->references('code')->on('atecos');
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
            $table->dropForeign('atecocode');
            $table->dropColumn('atecocode');
        });

        Schema::dropIfExists('atecos');
    }
}
