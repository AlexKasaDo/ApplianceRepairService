<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class JobsHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs_history',function (Blueprint $table){
           $table->bigIncrements('id');
           $table->bigInteger('job_id')->unsigned();
           $table->bigInteger('user_id')->unsigned();
           $table->string('action',255);
           $table->string('component',255);
           $table->timestamps();
           $table->foreign('job_id')->on('jobs')->references('id');
           $table->foreign('user_id')->on('users')->references('id');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs_history');
    }
}
