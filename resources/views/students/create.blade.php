@extends('app')

@section('content')
<div class="panel panel-primary">
    <div class="panel-heading">
        <h4>Thêm mới sinh viên</h4>
    </div>
    <div class="panel-body">
    {!! Form::open(['url' => 'students', 'class' => 'form-horizontal', 'id' => 'create-student-form']) !!}
        @include('students._form', ['submitButtonText' => 'Thêm mới'])
    {!! Form::close() !!}
    </div>
</div>
@stop