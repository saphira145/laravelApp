<?php
    $faker = \Faker\Factory::create();
?>

@extends('app')

@section('content')


<div class="row">
    <ul class="sex-filter col-xs-8">
        @foreach ($sex as $key => $value)
        <li>
            <input type="checkbox" id="sex-{{ $key }}" value="{{ $key }}" checked="checked">
            <label for="sex-{{ $key }}">{{ $value }}</label>
        </li>
        @endforeach
    </ul>
    <div class="col-xs-4 text-right">
        <a href="#" class="btn btn-primary" id="create-student" data-toggle="modal" data-target="#myModal">Create student</a>
    </div>
</div>



<table id="mytable" class='display' cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Mã sinh viên</th>
            <th>Họ tên</th>
            <th>Ngày sinh</th>
            <th>Giới tính</th>
            <th>Địa chỉ</th>
            <th>Action</th>
        </tr>
    </thead>
</table>

@include('students.Modal._editStudent')
@stop
