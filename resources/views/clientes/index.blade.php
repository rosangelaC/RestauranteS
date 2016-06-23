@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Clientes</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('clientes.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($clientes->isEmpty())
                <div class="well text-center">No Clientes found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Nit</th>
			<th>Nombres</th>
			<th>Direccion</th>
			<th>Telefono</th>
			
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($clientes as $cliente)
                        <tr>
                            <td>{!! $cliente->Nit !!}</td>
					<td>{!! $cliente->Nombres !!}</td>
					<td>{!! $cliente->Direccion !!}</td>
					<td>{!! $cliente->Telefono !!}</td>
					
                            <td>
                                <a href="{!! route('clientes.edit', [$cliente->Nit]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('clientes.delete', [$cliente->Nit]) !!}" onclick="return confirm('Are you sure wants to delete this Cliente?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection