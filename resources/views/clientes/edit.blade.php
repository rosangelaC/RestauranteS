@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($cliente, ['route' => ['clientes.update', $cliente->Nit], 'method' => 'patch' , 'class' => 'form-horizontal']) !!}

        @include('clientes.fields')

    {!! Form::close() !!}
</div>
@endsection
