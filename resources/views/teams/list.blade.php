@extends('layouts.app')

@section('content')

<div>
    <h2>Teams</h2>
    
    <a href="{{ route('teams.create') }}"><button>Create</button></a>

    <table>
        <tr>
            <th>Name</th>
            <th>Acronym</th>
            <th>Overall</th>
            <th>Actions</th>
        </tr>
        @forelse($teams as $team)
            <tr>
                <td>{{ $team->name }}</td>
                <td>{{ $team->acronym }}</td>
                <td>{{ $team->overall }}</td>
                <td>
                    <a href="{{ route('teams.show', $team->id) }}">Show</a>
                    <a href="{{ route('teams.edit', $team->id) }}">Edit</a>
                    <a href="javascript:void(0)" onclick="deleteTeam({{ json_encode($team) }})">Delete</a>
                </td>
            </tr>
        @empty
        <tr>
            <td colspan="3">No teams found.</td>
        </tr>
        @endforelse
    </table>
</div>

@endsection

<form action="{{ route('teams.destroy') }}" method="POST" id="formDelete">
    @method('DELETE')
    @csrf
    <input type="hidden" name="team_id">
</form>

@push('scripts')
    
<script>
    function deleteTeam(team) {
        if (confirm('Are you sure you want to delete '+team.name+'\'s team?')) {
            document.getElementById('formDelete').querySelector('input[name="team_id"]').value = team.id;
            document.getElementById('formDelete').submit();
        }
    }
</script>

@endpush