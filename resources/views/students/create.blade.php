@extends('app')

@section('content')
<div class="panel panel-primary">
    <div class="panel-heading">
        <a href="{{ route('students.index') }}"><i class="fa fa-arrow-circle-left"></i></a>
        <h4 class="col-md-offset-2">Thêm mới sinh viên</h4>
    </div>
    <div class="panel-body">
    {!! Form::open(['url' => 'students', 'class' => 'form-horizontal', 'id' => 'create-student-form']) !!}
        @include('students._form', ['submitButtonText' => 'Thêm mới'])
    {!! Form::close() !!}
    </div>
</div>
@stop