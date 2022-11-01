<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marks', function (Blueprint $table) {
            $table->id('id');
            $table->bigInteger('from');
            $table->enum('fromtype', \App\Enums\UserMarkTypeEnum::getValues());
            $table->bigInteger('to');
            $table->enum('totype', \App\Enums\UserMarkTypeEnum::getValues());
            $table->text('comment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marks');
    }
}
