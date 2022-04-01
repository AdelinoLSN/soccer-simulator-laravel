@extends('layouts.app')

@section('content')

<div>
    <h2>Create Match</h2>
    
    <form action="{{ route('matches.store') }}" method="POST">
        @csrf
        
        <label for="left_team_id">Left Team</label>
        <select name="left_team_id" id="left_team_id" onChange="updateSelectRightTeamId(this)">
            <option value="" disabled selected>Pick a team</option>
            @foreach($teams as $team)
                <option value="{{ $team->id }}">{{ $team->name }}</option>
            @endforeach
        </select>

        <label for="right_team_id">Right Team</label>
        <select name="right_team_id" id="right_team_id" onChange="updateSelectLeftTeamId(this)">
            <option value="" disabled selected>Pick a team</option>
            @foreach($teams as $team)
                <option value="{{ $team->id }}">{{ $team->name }}</option>
            @endforeach
        </select>

        <label for="is_neutral">Is Neutral?</label>
        <input type="checkbox" name="is_neutral" id="is_neutral">

        <button type="submit">Store</button>
    </form>
</div>

@endsection

@push('scripts')

<script>

window.onload = function() {
    var selectLeftTeamId = document.getElementById('left_team_id');
    updateSelectRightTeamId(selectLeftTeamId);

    var selectRightTeamId = document.getElementById('right_team_id');
    updateSelectLeftTeamId(selectRightTeamId);
}

function updateSelectRightTeamId(selectLeftTeamId) {
    const chosenTeamId = selectLeftTeamId.value;

    document.querySelectorAll('#right_team_id option').forEach(function(option) {
        if (option.value == "" || option.value == chosenTeamId) {
            option.disabled = true;
        } else {
            option.disabled = false;
        }
    });
}

function updateSelectLeftTeamId(selectRightTeamId) {
    const chosenTeamId = selectRightTeamId.value;

    document.querySelectorAll('#left_team_id option').forEach(function(option) {
        if (option.value == "" || option.value == chosenTeamId) {
            option.disabled = true;
        } else {
            option.disabled = false;
        }
    });
}

</script>

@endpush