<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('school_id');
            $table->unsignedBigInteger('academic_year_id');
            $table->unsignedBigInteger('semester_id');
            $table->string('exam_title');
            $table->date('exam_start_date');
            $table->date('exam_end_date');
            $table->enum('status', array('pending','completed','postponed','cancelled'))->default('pending');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('school_id')->references('id')->on('schools');
            $table->foreign('academic_year_id')->references('id')->on('academic_years');
            $table->foreign('semester_id')->references('id')->on('semesters');
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
        Schema::dropIfExists('exams');
    }
}
