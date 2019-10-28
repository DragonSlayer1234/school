<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOlympicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('olympics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('subjectId');
            $table->string('name');
            $table->string('exercise');
            $table->dateTime('startDate');
            $table->dateTime('endDate');
            $table->integer('cost');
            $table->string('status');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('olympics');
    }
}
