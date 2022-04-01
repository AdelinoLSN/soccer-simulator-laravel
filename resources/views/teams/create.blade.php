@extends('layouts.app')

@section('content')

<div>
    <h2>Create Team</h2>
    
    <form action="{{ route('teams.store') }}" method="POST">
        @csrf
        
        <label for="name">Name</label>
        <input type="text" name="name" id="name">
        
        <label for="acronym">Acronym</label>
        <input type="text" name="acronym" id="acronym">
        
        <label for="overall">Overall</label>
        <input type="number" name="overall" id="overall">

        <button type="submit">Store</button>
    </form>
</div>

@endsection