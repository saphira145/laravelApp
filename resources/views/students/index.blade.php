@extends('app')

@section('content')

<div class="search-box">
    @include('students._search')
</div>
<div class="list-student">
    @include('students._list_students')
</div>

 
@include('pagination', ['paginator' => $students])
@stop