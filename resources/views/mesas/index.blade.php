@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Mesas</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('mesas.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($mesas->isEmpty())
                <div class="well text-center">No Mesas found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Nro</th>
			<th>Estado</th>
			
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($mesas as $mesa)
                        <tr>
                            <td>{!! $mesa->Nro !!}</td>
					<td>{!! $mesa->Estado !!}</td>
					
                            <td>
                                <a href="{!! route('mesas.edit', [$mesa->Nro]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('mesas.delete', [$mesa->Nro]) !!}" onclick="return confirm('Are you sure wants to delete this Mesa?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection