<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('personals', function(Blueprint $table)
		{
			$table->integer('Ci')->primary()->unique()->required();
			$table->string('Nombres', 30);
			$table->string('Direccion', 50)->nullable();
			$table->string('Cargo', 20);
			$table->integer('Telefono');
			$table->integer('idRestaurant');
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
		Schema::drop('personals');
	}

}
