<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Team, Match};

class MatchController extends Controller
{
    public function list() {
        $matches = Match::all();

        return view('matches.list', compact('matches'));
    }

    public function create() {
        $teams = Team::all();

        return view('matches.create', compact('teams'));
    }

    public function store(Request $request) {
        $match = Match::create([
            'left_team_id' => $request->left_team_id,
            'right_team_id' => $request->right_team_id,
            'is_neutral' => $request->is_neutral ? true : false,
        ]);

        return redirect()->route('matches.list');
    }

    public function show($match_id) {
        $match = Match::with(['left_team', 'right_team'])->findOrFail($match_id);

        return view('matches.show', compact('match'));
    }

    public function edit($match_id) {
        $match = Match::with(['left_team', 'right_team'])->findOrFail($match_id);
        $teams = Team::all();

        return view('matches.edit', compact('match', 'teams'));
    }

    public function update(Request $request) {
        $match = Match::with(['left_team', 'right_team'])->findOrFail($request->match_id);

        $match->update([
            'left_team_id' => $request->left_team_id,
            'right_team_id' => $request->right_team_id,
            'left_team_score' => $request->left_team_score,
            'right_team_score' => $request->right_team_score,
            'is_neutral' => $request->is_neutral,
            'is_finished' => $request->is_finished,
        ]);

        return redirect()->route('matches.show', [$match->id]);
    }

    public function destroy(Request $request) {
        $match = Match::findOrFail($request->match_id);

        $match->delete();

        return redirect()->route('matches.list');
    }
}
