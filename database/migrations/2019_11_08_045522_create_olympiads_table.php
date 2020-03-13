<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOlympiadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('olympiads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('subject_id')->unsigned();
            $table->integer('teacher_id')->unsigned();
            $table->integer('work_id')->unsigned();
            $table->string('name');
            $table->text('description');
            $table->integer('cost');
            $table->datetime('start_date');
            $table->datetime('end_date');
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
        Schema::dropIfExists('olympiads');
    }
}
