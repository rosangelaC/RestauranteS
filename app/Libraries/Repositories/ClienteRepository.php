<?php

namespace App\Libraries\Repositories;


use App\Models\Cliente;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;

class ClienteRepository
{

	/**
	 * Returns all Clientes
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return Cliente::all()->where('idRestaurant',Auth::user()->id);
	}

	public function search($input)
    {
        $query = Cliente::query()->where('idRestaurant',Auth::user()->id);

        $columns = Schema::getColumnListing('clientes');
        $attributes = array();

        foreach($columns as $attribute){
            if(isset($input[$attribute]))
            {
	                $query->where($attribute, $input[$attribute]);
	                $attributes[$attribute] =  $input[$attribute];    	
            }else{
                $attributes[$attribute] =  null;
            }
        };

        return [$query->get(), $attributes];

    }

	/**
	 * Stores Cliente into database
	 *
	 * @param array $input
	 *
	 * @return Cliente
	 */
	public function store($input)
	{
		$input['idRestaurant']=Auth::user()->id;
		return Cliente::create($input);
	}

	/**
	 * Find Cliente by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|Cliente
	 */
	public function findClienteById($id)
	{
		return Cliente::find($id);
	}

	/**
	 * Updates Cliente into database
	 *
	 * @param Cliente $cliente
	 * @param array $input
	 *
	 * @return Cliente
	 */
	public function update($cliente, $input)
	{
		$cliente->fill($input);
		$cliente->save();

		return $cliente;
	}
}