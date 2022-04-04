@extends('layouts.app')

@section('content')

<div class="flex flex-col">
    <div class="flex flex-row">
        <h2>Matches</h2>
        <a href="{{ route('matches.create') }}">
            <button class="bg-green-700 text-white rounded px-3">Create</button>
        </a>
    </div>

    <table>
        <tr class="text-center">
            <th>Left Team</th>
            <th class="text-right">Left Score</th>
            <th>&nbsp;</th>
            <th class="text-left">Right Score</th>
            <th>Right Team</th>
            <th>Is Neutral?</th>
            <th>Actions</th>
        </tr>
        @forelse($matches as $match)
            <tr class="text-center">
                <td>{{ $match->left_team->name }}</td>
                <td class="text-right">{{ $match->is_played ? $match->left_team_score : '' }}</td>
                <td>x</td>
                <td class="text-left">{{ $match->is_played ? $match->right_team_score : '' }}</td>
                <td>{{ $match->right_team->name }}</td>
                <td>{{ $match->is_neutral ? 'Yes' : 'No' }}</td>
                <td>
                    <a href="{{ route('matches.show', [$match->id]) }}">Show</a>
                    <a href="{{ route('matches.edit', [$match->id]) }}">Edit</a>
                    <a href="{{ route('matches.play', [$match->id]) }}">
                        @if ($match->is_played)
                            Re-play
                        @else
                            Play
                        @endif
                    </a>
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
    function deleteMatch(match) {
        if (confirm('Are you sure you want to delete this match?')) {
            document.getElementById('formDelete').querySelector('input[name="match_id"]').value = match.id;
            document.getElementById('formDelete').submit();
        }
    }
</script>

@endpush