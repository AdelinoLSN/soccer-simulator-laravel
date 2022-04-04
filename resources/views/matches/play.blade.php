@extends('layouts.app')

@section('content')

<div>
    <h2>Play Match #{{ $match->id }}</h2>
    
    <form action="{{ route('matches.play.put') }}" method="POST">
        @method('PUT')
        @csrf
        <input type="hidden" name="match_id" value="{{ $match->id }}">
        
        <label>Left Team</label>
        <input readonly type="text" value="{{ $match->left_team->name }}">

        <label for="left_team_score">Left Team Score</label>
        <input type="text" name="left_team_score" id="left_team_score" value="{{ $match->left_team_score }}">

        <span>x</span>

        <input type="text" name="right_team_score" id="right_team_score" value="{{ $match->right_team_score }}">
        <label for="right_team_score">Right Team Score</label>

        <label>Right Team</label>
        <input readonly type="text" value="{{ $match->right_team->name }}">

        <button type="submit">Update</button>
    </form>

    <a href="{{ route('matches.play.auto', [$match->id]) }}">
        <button class="rounded bg-blue-700 text-white px-3">Auto Play</button>
    </a>
</div>

@endsection