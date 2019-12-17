<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImageJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('job_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->string('path',255);
            $table->text('description');
            $table->timestamps();
            $table->foreign('job_id')->references('id')->on('jobs');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('image_jobs');
    }
}
