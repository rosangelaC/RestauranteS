<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidosTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pedidos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->date('Fecha');
			$table->float('Total');
			$table->float('Pago');
			$table->float('Cambio');
			$table->integer('idRestaurant');
			$table->string('Nit');
			$table->foreign('Nit')
				  ->references('Nit')->on('Clientes')
				  ->onDelete('cascade');
			$table->integer('NroMesa');
			$table->string("Mesero", 30);
			$table->foreign('NroMesa')
				  ->references('Nro')->on('Mesas')
				  ->onDelete('cascade');
			
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
		Schema::drop('pedidos');
	}

}
