@extends('layouts.app')

@section('content')

<div>
    <h2>Matches</h2>
    
    <a href="{{ route('matches.create') }}"><button>Create</button></a>

    <table>
        <tr>
            <th>Left Team</th>
            <th>Left Score</th>
            <th>&nbsp;</th>
            <th>Right Score</th>
            <th>Right Team</th>
            <th>Is Neutral?</th>
            <th>Actions</th>
        </tr>
        @forelse($matches as $match)
            <tr>
                <td>{{ $match->left_team->name }}</td>
                <td>{{ $match->left_score }}</td>
                <td>x</td>
                <td>{{ $match->right_score }}</td>
                <td>{{ $match->right_team->name }}</td>
                <td>{{ $match->is_neutral ? 'Yes' : 'No' }}</td>
                <td>
                    <a href="{{ route('matches.show', [$match->id]) }}">Show</a>
                    <a href="{{ route('matches.edit', [$match->id]) }}">Edit</a>
                    <a href="javascript:void(0)" onclick="deleteMatch({{ json_encode($match) }})">Delete</a>
                </td>
            </tr>
        @empty
        <tr>
            <td colspan="7">No matches found.</td>
        </tr>
        @endforelse
    </table>
</div>

@endsection

<form action="{{ route('matches.destroy') }}" method="POST" id="formDelete">
    @method('DELETE')
    @csrf
    <input type="hidden" name="match_id">
</form>

@push('scripts')
    
<script>
    function deleteTeam(match) {
        if (confirm('Are you sure you want to delete this match?')) {
            document.getElementById('formDelete').querySelector('input[name="match_id"]').value = match.id;
            document.getElementById('formDelete').submit();
        }
    }
</script>

@endpush