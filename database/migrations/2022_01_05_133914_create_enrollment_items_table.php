<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnrollmentItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrollment_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('enrollment_id')->index();
            $table->unsignedBigInteger('course_id')->nullable();
            $table->unsignedBigInteger('batch_id')->nullable();
            $table->unsignedBigInteger('student_id')->nullable();
            $table->unsignedInteger('quantity');
            $table->decimal('price', 20, 6);
            $table->foreign('enrollment_id')->references('id')->on('enrollments')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('batch_id')->references('id')->on('batches');
            $table->foreign('student_id')->references('id')->on('users');

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
        Schema::dropIfExists('enrollment_items');
    }
}
