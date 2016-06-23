@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'mesas.store','class' => 'form-horizontal', 'role' => 'form'])!!}

        @include('mesas.fields')

    {!! Form::close() !!}
</div>
@endsection
