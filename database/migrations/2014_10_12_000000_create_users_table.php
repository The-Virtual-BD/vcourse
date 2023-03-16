<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('username')->unique()->nullable();
            $table->string('phone_number')->unique()->nullable();
            $table->string('profile_picture')->default('images/avatar.svg');
            $table->integer('slug')->unique()->nullable();
            $table->string('affiliate_link', 255)->nullable();
            $table->string('facebook', 255)->default('https://www.facebook.com/');
            $table->string('linkedin', 255)->default('https://www.linkedin.com/');
            $table->string('password');
            $table->boolean('applied')->default(false);
            $table->string('designation')->nullable();
            $table->string('experties')->nullable();
            $table->string('cv')->nullable();
            $table->text('about_me')->nullable();
            $table->text('note')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
