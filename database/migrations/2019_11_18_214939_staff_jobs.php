<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StaffJobs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('staff_jobs',function (Blueprint $table){
            $table->bigInteger('staff_id')->unsigned();
            $table->bigInteger('event_id')->unsigned();
            $table->foreign('staff_id')->references('id')->on('users');
            $table->foreign('event_id')->references('id')->on('events');
            $table->primary(['staff_id', 'event_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('staff_jobs');
    }
}
