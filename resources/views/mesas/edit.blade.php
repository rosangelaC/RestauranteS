@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($mesa, ['route' => ['mesas.update', $mesa->Nro], 'method' => 'patch','class' => 'form-horizontal']) !!}

        @include('mesas.fields')

    {!! Form::close() !!}
</div>
@endsection
