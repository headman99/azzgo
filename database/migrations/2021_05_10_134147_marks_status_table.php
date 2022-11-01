<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MarksStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('marks', function (Blueprint $table) {
            $table->text('attachments');
            $table->enum('status',\App\Enums\MarkStatusesEnum::getValues())->default(\App\Enums\MarkStatusesEnum::PENDING);
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
        Schema::table('marks', function (Blueprint $table) {
            $table->dropColumn('attachments');
            $table->dropColumn('status');
            $table->dropTimestamps();
        });
    }
}
