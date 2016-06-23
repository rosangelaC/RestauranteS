@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Pedidos</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('pedidos.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($pedidos->isEmpty())
                <div class="well text-center">No Pedidos found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>ID</th>
                    <th>Nit</th>
                    <th>Fecha</th>
			<th>Total</th>
			<th>Mesero</th>
			
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($pedidos as $pedido)
                        <tr>
                             <td>{!! $pedido->id !!}</td>
                             <td>{!! $pedido->Nit !!}</td>
                            <td>{!! $pedido->Fecha !!}</td>
        					<td>{!! $pedido->Total !!}</td>
        					<td>{!! $pedido->Mesero !!}</td>
							<td>
                                <a href="">Ver Detalle</a>
                                <a href="{!! route('pedidos.edit', [$pedido->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('pedidos.delete', [$pedido->id]) !!}" onclick="return confirm('Are you sure wants to delete this Pedido?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection