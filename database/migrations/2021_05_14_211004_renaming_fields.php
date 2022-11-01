<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenamingFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('marks', function (Blueprint $table) {
            $table->renameColumn('from', 'marker');
            $table->renameColumn('fromtype', 'markertype');
            $table->renameColumn('to', 'marked');
            $table->renameColumn('totype', 'markedtype');
        });

        Schema::table('feedbacks', function (Blueprint $table) {
            $table->renameColumn('from', 'reviewer');
            $table->renameColumn('fromtype', 'reviewertype');
            $table->renameColumn('to', 'reviewed');
            $table->renameColumn('totype', 'reviewedtype');
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
            $table->renameColumn('marker', 'from');
            $table->renameColumn('markertype', 'fromtype');
            $table->renameColumn('marked', 'to');
            $table->renameColumn('markedtype', 'totype');
        });

        Schema::table('feedbacks', function (Blueprint $table) {
            $table->renameColumn('reviewer', 'from');
            $table->renameColumn('reviewertype', 'fromtype');
            $table->renameColumn('reviewed', 'to');
            $table->renameColumn('reviewedtype', 'totype');
        });
    }
}
