<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    
	public $table = "mesas";

	public $primaryKey = "Nro";
    
	public $timestamps = true;

	public $fillable = [
	    "Nro",
		"Estado",
		"idRestaurant"
	];

	public static $rules = [
	    "Nro" => "required|integer",
		"Estado" => "required|max:20"
	];

	public function pedidos(){
		return $this->hasMany('Pedido','NroMesa','Nro');
	}

}
