<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('service_id')->unsigned()->nullable();
            $table->integer('contact_id')->unsigned()->nullable();
            $table->bigInteger('event_id')->unsigned()->nullable();
            $table->bigInteger('status_id')->unsigned()->nullable();
            $table->text('description')->nullable();
            $table->text('scope_of_work')->nullable();
            $table->timestamps();
            $table->foreign('service_id')->references('id')->on('services')->onUpdate('CASCADE')->onDelete('set null');
            $table->foreign('status_id')->references('id')->on('status_jobs')->onUpdate('CASCADE')->onDelete('set null');
            $table->foreign('contact_id')->references('id')->on('contacts')->onUpdate('CASCADE')->onDelete('set null');
            $table->foreign('event_id')->references('id')->on('events')->onUpdate('CASCADE')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
