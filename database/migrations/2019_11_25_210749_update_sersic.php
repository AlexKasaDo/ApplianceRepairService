<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSersic extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('services', function (Blueprint $table){
            $table->text('description')->nullable();
            $table->integer('default_appointment_length')->default(0);
            $table->string('typical_cost', 255)->nullable();
            $table->string('background_color', 255);
            $table->string('text_color', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('services', function (Blueprint $table){
            $table->dropColumn('description');
            $table->dropColumn('default_appointment_length');
            $table->dropColumn('typical_cost');
            $table->dropColumn('background_color');
            $table->dropColumn('text_color');
        });
    }
}
