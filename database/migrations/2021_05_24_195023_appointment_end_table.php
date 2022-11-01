<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AppointmentEndTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('requestshistory', function (Blueprint $table) {
            $table->date('appointmentenddate')->nullable();
            $table->time('appointmenendtime')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('requestshistory', function (Blueprint $table) {
            $table->dropColumn('appointmentenddate');
            $table->dropColumn('appointmenendtime');
        });
    }
}
