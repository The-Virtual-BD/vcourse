<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnrollmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();
            $table->string('enrollment_number')->unique();
            $table->integer('amount');
            $table->string('msg');
            $table->string('sp_code');
            $table->string('sp_code_des');
            $table->string('sp_payment_option');
            $table->string('status');
            $table->string('bank_status');
            $table->string('tx_id');
            $table->string('bank_tx_id');
            $table->unsignedBigInteger('student_id')->nullable();
            $table->string('payment_status');
            $table->string('payment_method')->nullable();
            $table->text('notes')->nullable();
            $table->unsignedBigInteger('affilator_id')->nullable();

            $table->foreign('student_id')->references('id')->on('users');
            $table->foreign('affilator_id')->references('id')->on('users');

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
        Schema::dropIfExists('enrollments');
    }
}
