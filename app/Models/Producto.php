<?php namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    
	public $table = "productos";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "Nombre",
		"Precio",
		"Cantidad",
		"idCategoria",
		"idRestaurant"
	];

	public static $rules = [
	    "Nombre" => "required|max:30",
		"Precio" => "required",
		"Cantidad" => "required|integer"
	];

	public function categorias()
	{
		return $this->belongsTo('Categoria');
	}

	public function pedidos()
	{
		return $this->belongsTo('Pedido');
	}
	


}
