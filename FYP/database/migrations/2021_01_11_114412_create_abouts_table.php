<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('title_about')->nullable();
            $table->text('desc_about')->nullable();
            $table->string('title_mission')->nullable();
            $table->text('desc_mission')->nullable();
            $table->string('title_people')->nullable();
            $table->text('desc_people')->nullable();
            $table->string('title_vision')->nullable();
            $table->text('desc_vision')->nullable();
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
        Schema::dropIfExists('abouts');
    }
}
