<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programacaos', function (Blueprint $table) {
            $table->increments('id');
		$table->string('name');
		$table->string('description');
		$table->timestamp('date');
		$table->time('startSchedule');
		$table->time('endSchedule');
		$table->string('local');
			$table->integer('palestra');
			$table->integer('workshop');

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
        Schema::dropIfExists('programacaos');
    }
}
