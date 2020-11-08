<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('farm_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('cropfarm_id')->nullable();
            $table->string('titles')->nullable();
            $table->string('description');
            $table->string('moneySpent');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
            $table->foreign('farm_id')->references('id')->on('farms')->onUpdate('cascade');
            $table->foreign('cropfarm_id')->references('id')->on('cropfarms')->onUpdate('cascade');
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
        Schema::dropIfExists('expenses');
    }
}
