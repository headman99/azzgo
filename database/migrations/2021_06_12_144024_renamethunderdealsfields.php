<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Renamethunderdealsfields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*Schema::table('thunderdeals', function (Blueprint $table) {
            $table->renameColumn('titolo', 'title');
            $table->renameColumn('datainizio', 'startdate');
            $table->renameColumn('datafine', 'enddate');
        });*/
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
