<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('thumbnail')->default('images/vcourse_dummy_thumbnail_370_280.jpg')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->decimal('price',6,2);
            $table->decimal('old_price',6,2);
            $table->string('status')->nullable();
            $table->string('time_duration')->nullable();
            $table->string('media_link')->nullable();
            $table->string('rating_number')->nullable();
            $table->string('rating_quantity')->nullable();
            $table->integer('number_of_lessons')->nullable();
            $table->string('student_enrolled')->nullable();
            $table->integer('discount')->nullable();
            $table->string('timing')->nullable();
            $table->string('venu')->nullable();
            $table->text('description')->nullable();
            $table->text('requirments')->nullable();
            $table->text('forwho')->nullable();
            $table->text('what_will_learn')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }


    // id
    // name
    // instructor
    // category
    // price
    // status
    // time_duration
    // media_link
    // rating_number
    // rating_quantity
    // number_of_lessons
    // student_enrolled
    // discount
    // timing
    // venu
    // description
    // requirments
    // forwho
    // what_will_learn


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
