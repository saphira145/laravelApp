@extends('app')

@section('content')

<div class="panel panel-primary">
    <div class="panel-heading">
        <h4>Thêm mới sinh viên</h4>
    </div>
    <div class="panel-body">
    {!! Form::model($student, ['url' => 'students/' . $student->id, 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
        @include('students._form', ['submitButtonText' => 'Sửa'])
    {!! Form::close() !!}
    
    {!! Form::open(['method' => 'DELETE', 'url' => route('students.destroy', [$student->id])]) !!}
    {!! Form::submit('Delete', ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}
    </div>
</div>  


@stop