<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events',
            function (Blueprint $table){
                $table->bigIncrements('id');
                $table->dateTime('start_date');
                $table->dateTime('end_date');
                $table->string('text');
                $table->bigInteger('type_id')->unsigned()->nullable();
                $table->timestamps();
                $table->foreign('type_id')
                    ->references('id')
                    ->on('event_types')
                    ->onDelete('set null')
                    ->onUpdate('CASCADE');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
