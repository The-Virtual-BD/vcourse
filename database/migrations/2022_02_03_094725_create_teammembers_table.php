<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeammembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teammembers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->mediumText('photo');
            $table->string('designation');
            $table->mediumText('facebook');
            $table->mediumText('linkedin');
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
        Schema::dropIfExists('teammembers');
    }
}
