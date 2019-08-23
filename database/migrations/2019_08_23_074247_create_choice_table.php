<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('choice', function (Blueprint $table) {
            $table->bigIncrements('choice_id');
            $table->unsignedBigInteger('questions_id');
            $table->string('choice_text', 200);
            $table->unsignedBigInteger('created_by_user');
            $table->timestamps();

            $table->foreign('questions_id')
                  ->references('questions_id')
                  ->on('questions')
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
        Schema::dropIfExists('choice');
    }
}
