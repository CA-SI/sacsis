<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participantes', function (Blueprint $table) {
            $table->increments('id');
		$table->string('name');
		$table->string('company');
		$table->string('institution');
		$table->integer('entryYear');
		$table->integer('cpf');
		$table->integer('rg');
		$table->integer('cellphone');
		$table->string('facebook');
		$table->string('twitter');
		$table->string('linkedin');
		$table->string('avatar');
		$table->string('organizer');
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
        Schema::dropIfExists('participantes');
    }
}
