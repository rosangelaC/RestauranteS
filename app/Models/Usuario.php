<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model implements UserInterface, RemindableInterface
{
    
	public $table = "users";

	public $primaryKey = "username";
    
	public $timestamps = true;

	public $fillable = [
	    "username",
	    "email",
	    "password",
	    "confirmar"
	    "restaurante",
		"idRestaurant"
	];

	public static $rules = [
	    "username" => "required|max:15|unique:users",
	    "email" => "unique:users|required|max:50|email",
	    "password" => "required|min:6|max:8|alpha_num",
	    "confirmar" => "required|min:6|max:8|alpha_num|confirmed",
	    "restaurante" => "required|max:30"
	];

}