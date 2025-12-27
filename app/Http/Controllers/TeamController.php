<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::latest()->get();
        return view('teams.index', compact('teams'));
    }

    public function create()
    {
        return view('teams.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'team_name' => 'required',
            'player1_name' => 'required',
            'player2_name' => 'nullable',
            'team_logo' => 'image|mimes:jpg,png,jpeg|max:2048',
            'player1_image' => 'image|mimes:jpg,png,jpeg|max:2048',
            'player2_image' => 'image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('team_logo')) {
            $data['team_logo'] = $request->file('team_logo')->store('teams', 'public');
        }

        if ($request->hasFile('player1_image')) {
            $data['player1_image'] = $request->file('player1_image')->store('players', 'public');
        }

        if ($request->hasFile('player2_image')) {
            $data['player2_image'] = $request->file('player2_image')->store('players', 'public');
        }

        Team::create($data);

        return redirect()->route('teams.index')->with('success', 'Team created successfully');
    }

    public function edit(Team $team)
    {
        return view('teams.edit', compact('team'));
    }

    public function update(Request $request, Team $team)
    {
        $request->validate([
            'team_name' => 'required',
            'player1_name' => 'required',
            'team_logo' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'player1_image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'player2_image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $data = $request->only([
            'team_name',
            'coach_name',
            'player1_name',
            'player2_name',
        ]);

        if ($request->hasFile('team_logo')) {
            $data['team_logo'] = $request->file('team_logo')->store('teams', 'public');
        }

        if ($request->hasFile('player1_image')) {
            $data['player1_image'] = $request->file('player1_image')->store('players', 'public');
        }

        if ($request->hasFile('player2_image')) {
            $data['player2_image'] = $request->file('player2_image')->store('players', 'public');
        }

        $team->update($data);

        return redirect()->route('teams.index')->with('success', 'Team updated');
    }


    public function destroy(Team $team)
    {
        $team->delete();
        return redirect()->route('teams.index');
    }
}
