<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    
	public $table = "personals";

	public $primaryKey = "Ci";
    
	public $timestamps = true;

	public $fillable = [
	    "Ci",
		"Nombres",
		"Direccion",
		"Cargo",
		"Telefono",
		"idRestaurant"
	];

	public static $rules = [
	    "Ci" => "required|integer",
		"Nombres" => "required|max:30|alpha",
		"Cargo" => "required|alpha",
		"Telefono" => "integer"
	];

	

}
