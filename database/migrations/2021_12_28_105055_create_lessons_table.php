<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('batch_id');
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->integer('number');
            $table->string('media_link');
            $table->string('thumbnail');
            $table->string('description');
            $table->string('note');
            $table->timestamps();

            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('batch_id')->references('id')->on('batches')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users');


        });
    }
    // course_id
    // lesson_number
    // lesson_name
    // lesson_media_link
    // lesson_thumbnail
    // lesson_description
    // lesson_note
    // lesson_comments
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lessons');
    }
}
