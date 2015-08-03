@extends('app')

@section('content')

{!! Form::open(['url' => 'students']) !!}
    @include('students._form', ['submitButtonText' => 'Thêm mới'])
{!! Form::close() !!}

@stop