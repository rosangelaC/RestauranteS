@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'pedidos.store','class' => 'form-horizontal']) !!}

        @include('pedidos.fields')

    {!! Form::close() !!}
</div>
@endsection
