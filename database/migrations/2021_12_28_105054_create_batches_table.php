<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batches', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('number')->nullable();
            $table->integer('max_seat')->nullable();
            $table->integer('enrolled_students')->nullable();
            $table->date('last_ennrollment_date')->nullable();
            $table->date('class_starting_date')->nullable();
            $table->unsignedBigInteger('course_id')->nullable();
            $table->string('status')->default('srarting soon');
            $table->timestamps();

            $table->foreign('course_id')
                ->references('id')
                ->on('courses')
                ->onDelete('cascade');
        });
    }

    // srarting soon/running/complete

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('batches');
    }
}
