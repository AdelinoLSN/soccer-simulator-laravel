<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends Controller
{
    public function index() {
        $teams = Team::all();

        return view('teams.index', compact('teams'));
    }

    public function create() {
        return view('teams.create');
    }

    public function store(Request $request) {
        $team = Team::create([
            'name' => $request->name,
            'acronym' => $request->acronym,
            'overall' => $request->overall,
        ]);

        return redirect()->route('teams.index');
    }

    public function show($team_id) {
        $team = Team::findOrFail($team_id);
        
        return view('teams.show', compact('team'));
    }

    public function edit($team_id) {
        $team = Team::findOrFail($team_id);

        return view('teams.edit', compact('team'));
    }

    public function update(Request $request) {
        $team = Team::findOrFail($request->team_id);

        $team->update([
            'name' => $request->name,
            'acronym' => $request->acronym,
            'overall' => $request->overall,
        ]);

        return redirect()->route('teams.show', [$team->id]);
    }

    public function destroy(Request $request) {
        $team = Team::findOrFail($request->team_id);

        $team->delete();

        return redirect()->route('teams.index');
    }
}
