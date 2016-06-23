@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'personals.store','class' => 'form-horizontal']) !!}

        @include('personals.fields')

    {!! Form::close() !!}
</div>
@endsection
