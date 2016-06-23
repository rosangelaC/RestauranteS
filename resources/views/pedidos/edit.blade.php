@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($pedido, ['route' => ['pedidos.update', $pedido->id], 'method' => 'patch', 'class' => 'form-horizontal']) !!}

        @include('pedidos.fields')

    {!! Form::close() !!}
</div>
@endsection
