<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title_services');
            $table->string('title_tile_1'); $table->text('desc_tile_1');
            $table->string('title_tile_2'); $table->text('desc_tile_2');
            $table->string('title_tile_3'); $table->text('desc_tile_3');
            $table->string('title_tile_4'); $table->text('desc_tile_4');
            $table->string('title_tile_5'); $table->text('desc_tile_5');
            $table->string('title_tile_6'); $table->text('desc_tile_6');
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
        Schema::dropIfExists('services');
    }
}
