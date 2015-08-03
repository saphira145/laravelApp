@extends('app')

@section('content')

{!! link_to_route('students.create', 'Nhap sinh vien moi', [], ['class' => 'btn btn-primary']) !!}

@include('students._search')
<div class="list-student">
    @include('students._list_students')
</div>

 
@include('pagination', ['paginator' => $students])
@stop