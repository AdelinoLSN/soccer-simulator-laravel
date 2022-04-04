@extends('layouts.app')

@section('content')

<div class="flex flex-col">
    <a href="{{ route('teams.index') }}">Teams</a>
    <a href="{{ route('matches.index') }}">Matches</a>
</div>
    
@endsection
