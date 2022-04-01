@extends('layouts.app')

@section('content')

<a href="{{ route('teams.list') }}">Teams</a>
<a href="{{ route('matches.list') }}">Matches</a>

@endsection
