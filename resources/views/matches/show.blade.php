@extends('layouts.app')

@section('content')

<div>
    <h2>Match #{{ $match->id }}</h2>
    
    <table>
        <tr>
            <th>{{ $match->left_team->name }}</th>
            <td>({{ $match->left_team->acronym }})</td>
            <td>{{ $match->is_finished ? $match->left_score : '' }}</td>
            <td>x</td>
            <td>{{ $match->is_finished ? $match->right_score : '' }}</td>
            <td>({{ $match->right_team->acronym }})</td>
            <th>{{ $match->right_team->name }}</th>
            <td>| Is neutral? {{ $match->is_neutral ? 'Yes' : 'No' }}</td>
        </tr>
    </table>
</div>

@endsection