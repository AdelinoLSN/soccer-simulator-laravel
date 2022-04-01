@extends('layouts.app')

@section('content')

<div>
    <h2>{{ $team->name }}'s Team</h2>
    
    <table>
        <tr>
            <th>Name</th>
            <td>{{ $team->name }}</td>
        </tr>
        <tr>
            <th>Acronym</th>
            <td>{{ $team->acronym }}</td>
        </tr>
        <tr>
            <th>Overall</th>
            <td>{{ $team->overall }}</td>
        </tr>
    </table>
</div>

@endsection