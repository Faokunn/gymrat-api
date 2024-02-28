<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program_exercises', function (Blueprint $table) {
            $table->id();
            $table->string('exercise');
            $table->string('group_muscle');
            $table->string('target_muscle');
            $table->integer('sets');
            $table->integer('reps');
            $table->integer('weight');
            $table->bigInteger('program_id')->unsigned();
            $table->foreign('program_id')->references('id')->on('programs');
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
        Schema::dropIfExists('program_exercises');
    }
};
