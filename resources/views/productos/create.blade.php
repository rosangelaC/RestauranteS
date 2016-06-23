@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'productos.store','class' => 'form-horizontal']) !!}

        @include('productos.fields')

    {!! Form::close() !!}
</div>
@endsection
