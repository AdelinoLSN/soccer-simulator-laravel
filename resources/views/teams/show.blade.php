@extends('layouts.app')

@section('content')

<div>
    <span class="text-xl font-bold">{{ $team->name }}'s Team</span>

    <hr class="my-5">
    
    <table>
        <tr>
            <th class="text-right">Name:&nbsp;</th>
            <td>{{ $team->name }}</td>
        </tr>
        <tr>
            <th class="text-right">Acronym:&nbsp;</th>
            <td>{{ $team->acronym }}</td>
        </tr>
        <tr>
            <th class="text-right">Overall:&nbsp;</th>
            <td>{{ $team->overall }}</td>
        </tr>
    </table>
</div>

@endsection