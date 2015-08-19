<?php
    $faker = \Faker\Factory::create();
?>

@extends('app')

@section('content')

<table id="mytable" class='display' cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Phone</th>
        </tr>
    </thead>
    <tbody>
        @for ($i = 1; $i < 100; $i++)
        <tr>
            <td>{{ $faker->name }}</td>
            <td>{{ $faker->email }}</td>
            <td>{{ $faker->address }}</td>
            <td>{{ $faker->phoneNumber }}</td>
        </tr>
        @endfor
    </tbody>
</table>

@stop
