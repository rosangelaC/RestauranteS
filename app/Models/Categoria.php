<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    
	public $table = "categorias";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "nombre",
		"idRestaurant"
	];

	public static $rules = [
	    "nombre" => "required|max:30"
	];

	public function productos()
	{
		return $this->hasMany('Producto','idCategoria','id');
	}

}
