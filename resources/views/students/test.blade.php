<?php
    $faker = \Faker\Factory::create();
?>

@extends('app')

@section('content')
<input id="_token" value="{{ session()->getToken() }}" class="hidden">
<table id="mytable" class='display' cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Mã sinh viên</th>
            <th>Họ tên</th>
            <th>Ngày sinh</th>
            <th>Giới tính</th>
            <th>Địa chỉ</th>
        </tr>
    </thead>
<!--    <tbody>
        @for ($i = 1; $i < 100; $i++)
        <tr>
            <td>{{ $faker->name }}</td>
            <td>{{ $faker->email }}</td>
            <td>{{ $faker->address }}</td>
            <td>{{ $faker->phoneNumber }}</td>
        </tr>
        @endfor
    </tbody>-->
</table>

@stop
