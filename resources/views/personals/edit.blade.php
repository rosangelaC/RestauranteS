@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($personal, ['route' => ['personals.update', $personal->Ci], 'method' => 'patch','class' => 'form-horizontal']) !!}

        @include('personals.fields')

    {!! Form::close() !!}
</div>
@endsection
