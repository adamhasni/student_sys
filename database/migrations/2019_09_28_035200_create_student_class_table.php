<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_class', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('stu_id');
            $table->unsignedBigInteger('class_id');
            $table->integer('year');
            $table->integer('status');
            $table->timestamps();
        });

        Schema::table('student_class', function (Blueprint $table) {
            // FK
            $table->foreign('stu_id')->references('id')->on('students');
            $table->foreign('class_id')->references('id')->on('classes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_class');
    }
}
