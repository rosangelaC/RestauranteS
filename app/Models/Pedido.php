<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    
	public $table = "pedidos";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "Fecha",
		"Total",
		"Pago",
		"Cambio",
		"idRestaurant",
		"Nit",
		"NroMesa",
		"Mesero"
	];

	public static $rules = [
	    "Total" => "required",
		"Pago" => "required",
		"Cambio" => "required",
		"Nit" => "required",
		"NroMesa" => "required|integer",
		"Mesero" => "required|alpha"
	];

	public function mesas()
	{
		return $this->belongsTo('Mesa');
	}

	public function clientes()
	{
		return $this->belongsTo('Cliente');
	}

}
