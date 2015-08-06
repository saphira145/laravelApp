@extends('app')

@section('content')

<div class="panel panel-primary panel-custom">
    <div class="panel-heading">
        <h4>Thêm mới sinh viên</h4>
    </div>
    <div class="panel-body">
    {!! Form::model($student, ['url' => 'students/' . $student->id, 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
        @include('students._form', ['submitButtonText' => 'Sửa'])
    {!! Form::close() !!}
    
    {!! Form::open(['method' => 'DELETE', 'url' => route('students.destroy', [$student->id]), 'class' => 'form-horizontal']) !!}
        <div class="form-group">
            <div class="col-sm-12 col-md-offset-10 col-md-2">
                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-delete col-md-4 form-control']) !!}
            </div>
        </div>
    {!! Form::close() !!}
    </div>
</div>

<script>
    
</script>

@stop
