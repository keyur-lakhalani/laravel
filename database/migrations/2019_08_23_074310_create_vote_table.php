<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */vote
    public function up()
    {
        Schema::create('vote', function (Blueprint $table) {
            $table->bigIncrements('vote_id');
            $table->unsignedBigInteger('choice_id');
            $table->string('user_ip', 20)->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();

            $table->foreign('choice_id')
                  ->references('choice_id')
                  ->on('choice')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vote');
    }
}
