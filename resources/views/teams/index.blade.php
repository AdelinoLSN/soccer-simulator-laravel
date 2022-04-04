@extends('layouts.app')

@section('content')

<div class="flex flex-col">
    <div class="flex flex-row">
        <span class="text-xl font-bold mr-10">Teams</span>
        <a href="{{ route('teams.create') }}">
            <button class="bg-green-700 text-white px-5 rounded">Create</button>
        </a>
    </div>

    <hr class="my-5">

    <table>
        <tr class="text-center">
            <th class="text-left">Name</th>
            <th>Acronym</th>
            <th>Overall</th>
            <th>Actions</th>
        </tr>
        @forelse($teams as $team)
            <tr class="text-center">
                <td class="text-left">{{ $team->name }}</td>
                <td>{{ $team->acronym }}</td>
                <td>{{ $team->overall }}</td>
                <td>
                    <a href="{{ route('teams.show', $team->id) }}">
                        <button class="rounded bg-blue-900 text-white px-3">Show</button>
                    </a>
                    <a href="{{ route('teams.edit', $team->id) }}">
                        <button class="rounded bg-blue-200 px-3">Edit</button>
                    </a>
                    <a href="javascript:void(0)" onclick="deleteTeam({{ json_encode($team) }})">
                        <button class="rounded bg-red-500 text-white px-3">Delete</button>
                    </a>
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