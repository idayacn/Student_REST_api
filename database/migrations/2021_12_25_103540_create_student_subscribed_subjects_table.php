<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentSubscribedSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_subscribed_subjects', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('student_id')->nullable();
            $table->foreign('student_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedInteger('subject_id')->nullable();
            $table->foreign('subject_id')
                ->references('id')
                ->on('subject')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedInteger('is_favorite');
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
        Schema::dropIfExists('student_subscribed_subjects');
    }
}
