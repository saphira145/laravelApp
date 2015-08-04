@extends('app')

@section('content')


<div class="list-student">
    @include('students._list_students')
</div>

 
@include('pagination', ['paginator' => $students])
@stop