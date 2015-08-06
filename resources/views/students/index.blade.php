@extends('app')

@section('content')

@if (Session::has('flash_message'))
<div class="alert alert-success">
    {{ session('flash_message') }}
</div>
@endif
<div class="list-student">
    @include('students._list_students')
</div>

@stop