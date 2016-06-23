@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Personals</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('personals.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($personals->isEmpty())
                <div class="well text-center">No Personals found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Ci</th>
			<th>Nombres</th>
			<th>Direccion</th>
			<th>Cargo</th>
			<th>Telefono</th>
			
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($personals as $personal)
                        <tr>
                            <td>{!! $personal->Ci !!}</td>
					<td>{!! $personal->Nombres !!}</td>
					<td>{!! $personal->Direccion !!}</td>
					<td>{!! $personal->Cargo !!}</td>
					<td>{!! $personal->Telefono !!}</td>
					
                            <td>
                                <a href="{!! route('personals.edit', [$personal->Ci]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('personals.delete', [$personal->Ci]) !!}" onclick="return confirm('Are you sure wants to delete this Personal?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection