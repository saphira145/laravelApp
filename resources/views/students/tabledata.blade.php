<?php
    $faker = \Faker\Factory::create();
?>

@extends('app')

@section('content')
<input id="_token" value="{{ session()->getToken() }}" class="hidden">

<ul class="sex-filter">
    @foreach ($sex as $key => $value)
    <li>
        <input type="checkbox" id="sex-{{ $key }}" value="{{ $key }}" checked="checked">
        <label for="sex-{{ $key }}">{{ $value }}</label>
    </li>
    @endforeach

</ul>

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
