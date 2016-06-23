@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'categorias.store','class' => 'form-horizontal']) !!}

        @include('categorias.fields')

    {!! Form::close() !!}
</div>
@endsection
