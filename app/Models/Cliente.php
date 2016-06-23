<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    
	public $table = "clientes";

	public $primaryKey = "Nit";
    
	public $timestamps = true;

	public $fillable = [
	    "Nit",
		"Nombres",
		"Direccion",
		"Telefono",
		"idRestaurant"
	];

	public static $rules = [
	    "Nit" => "required",
		"Nombres" => "required|max:30",
		"Direccion" => "required|max:50",
		"Telefono" => "required|integer"
	];

	public function pedidos()
	{
		return $this->hasMany('Pedido','Nit','Nit');
	}

}
