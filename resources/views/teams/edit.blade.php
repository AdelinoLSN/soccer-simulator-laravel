@extends('layouts.app')

@section('content')

<div>
    <h2>Edit {{ $team->name }}'s Team</h2>
    
    <form action="{{ route('teams.update') }}" method="POST">
        @method('PUT')
        @csrf
        <input type="hidden" name="team_id" value="{{ $team->id }}">
        
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ $team->name }}">
        
        <label for="acronym">Acronym</label>
        <input type="text" name="acronym" id="acronym" value="{{ $team->acronym }}">
        
        <label for="overall">Overall</label>
        <input type="number" name="overall" id="overall" value="{{ $team->overall }}">

        <button type="submit">Update</button>
    </form>
</div>

@endsection