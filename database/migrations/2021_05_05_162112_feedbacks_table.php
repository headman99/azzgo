<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FeedbacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->uuid('code')->primary()->unique();
            $table->string('from');
            $table->enum('fromtype', \App\Enums\FeedbackTypesEnum::getValues());
            $table->string('to');
            $table->enum('totype', \App\Enums\FeedbackTypesEnum::getValues());
            $table->float('value');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feedbacks');
    }
}
