<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCropfarmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cropfarms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('farm_id');
            $table->foreign('farm_id')->references('id')->on('farms')->onUpdate('cascade');
            $table->unsignedBigInteger('season_id');
            $table->foreign('season_id')->references('id')->on('seasons')->onUpdate('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
            $table->unsignedBigInteger('crop_id');
            $table->foreign('crop_id')->references('id')->on('crops')->onUpdate('cascade');
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('cropfarms');
    }
}
