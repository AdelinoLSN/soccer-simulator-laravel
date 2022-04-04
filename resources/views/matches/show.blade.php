@extends('layouts.app')

@section('content')

<div>
    <h2>Match #{{ $match->id }}</h2>
    
    <table>
        <tr>
            <th>{{ $match->left_team->name }}</th>
            <td>({{ $match->left_team->acronym }})</td>
            <td>{{ $match->is_played ? $match->left_team_score : '' }}</td>
            <td>x</td>
            <td>{{ $match->is_played ? $match->right_team_score : '' }}</td>
            <td>({{ $match->right_team->acronym }})</td>
            <th>{{ $match->right_team->name }}</th>
            <td>| Is neutral? {{ $match->is_neutral ? 'Yes' : 'No' }}</td>
        </tr>
    </table>
</div>

@endsection