<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use App\Models\Team;
use App\Models\TournamentMatch;
use App\Services\MatchGenerator;
use Illuminate\Http\Request;

class TournamentController extends Controller
{
    /* =======================
       LIST TOURNAMENTS
    ======================== */
    public function index()
    {
        $tournaments = Tournament::latest()->get();

        return view('tournaments.index', compact('tournaments'));
    }


    /* =======================
       STORE TOURNAMENT
    ======================== */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'max_teams' => 'required|integer|min:2',
        ]);

        Tournament::create($request->only('name', 'max_teams'));

        return redirect()->route('tournaments.index')
            ->with('success', 'Tournament created');
    }

    /* =======================
       SHOW TOURNAMENT
    ======================== */
    public function show(Tournament $tournament)
    {
        $tournament->load('teams', 'matches');

        $registeredTeams = $tournament->teams;

        $availableTeams = Team::whereNotIn(
            'id',
            $registeredTeams->pluck('id')
        )->get();

        return view('tournaments.show', compact(
            'tournament',
            'registeredTeams',
            'availableTeams'
        ));
    }

    /* =======================
       REGISTER TEAMS
    ======================== */
    public function registerTeams(Request $request, Tournament $tournament)
    {
        $request->validate([
            'teams' => 'required|array',
            'teams.*' => 'exists:teams,id',
        ]);

        $alreadyRegistered = $tournament->teams()
            ->pluck('teams.id')
            ->toArray();

        $teamsToAttach = array_diff(
            $request->teams,
            $alreadyRegistered
        );

        if (count($teamsToAttach) === 0) {
            return back()->with('error', 'Selected teams are already registered');
        }

        $tournament->teams()->attach($teamsToAttach);

        return back()->with('success', 'Teams registered successfully');
    }


    /* =======================
       GENERATE MATCHES
    ======================== */
    public function generateMatches(Tournament $tournament, MatchGenerator $generator)
    {
        if ($tournament->teams()->count() !== $tournament->max_teams) {
            return back()->with('error', 'Teams not complete');
        }

        if ($tournament->status !== 'upcoming') {
            return back()->with('error', 'Matches already generated');
        }

        $generator->generate($tournament);

        return back()->with('success', 'Matches generated successfully');
    }

    /* =======================
       UNUSED (FOR NOW)
    ======================== */
    public function edit() {}
    public function update() {}
    public function destroy() {}



    public function generateNextRound(Tournament $tournament)
    {
        // Get latest round number
        $currentRound = $tournament->matches()->max('round');

        // All matches of current round
        $currentMatches = $tournament->matches()
            ->where('round', $currentRound)
            ->get();

        // Ensure all matches are completed
        if ($currentMatches->where('status', '!=', 'completed')->count()) {
            return back()->with('error', 'Complete all matches before generating next round');
        }

        // Get winners
        $winners = $currentMatches->pluck('winner_id')->filter();

        if ($winners->count() < 2) {
            $tournament->update([
                'status' => 'completed'
            ]);
            return back()->with('success', 'Tournament completed! Champion decided.');
        }

        // Pair winners and create next round
        $nextRound = $currentRound + 1;
        $pairs = $winners->chunk(2);

        foreach ($pairs as $pair) {
            TournamentMatch::create([
                'tournament_id' => $tournament->id,
                'team_one_id' => $pair[0],
                'team_two_id' => $pair[1],
                'round' => $nextRound,
                'status' => 'scheduled',
            ]);
        }

        return back()->with('success', "Round {$nextRound} matches generated");
    }


}
