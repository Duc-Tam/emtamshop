<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pro_attributes', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->string('lap_cpu')->nullable();
            $table->string('lap_ram')->nullable();
            $table->string('lap_main')->nullable();
            $table->string('lap_card')->nullable();
            $table->string('lap_screen')->nullable();
            $table->string('lap_conggiaotiep')->nullable();
            $table->string('lap_audio')->nullable();
            $table->string('lap_LAN')->nullable();
            $table->string('lap_WIFI')->nullable();
            $table->string('lap_blutooth')->nullable();
            $table->string('lap_system')->nullable();
            $table->string('lap_pin')->nullable();
            $table->string('lap_weight')->nullable();
            $table->string('lap_size')->nullable();
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
        Schema::dropIfExists('pro_attributes');
    }
}
