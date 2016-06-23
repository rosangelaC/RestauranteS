@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'clientes.store','class'=> 'form-horizontal']) !!}

        @include('clientes.fields')

    {!! Form::close() !!}
</div>
@endsection
