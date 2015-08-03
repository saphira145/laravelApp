@extends('app')

@section('content')

{!! Form::model($student, ['url' => 'students/' . $student->id, 'method' => 'PUT']) !!}
    @include('students._form', ['submitButtonText' => 'Sửa'])
{!! Form::close() !!}
{!! Form::open(['method' => 'DELETE', 'url' => route('students.destroy', [$student->id])]) !!}
    {!! Form::submit('Delete', ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}

@stop