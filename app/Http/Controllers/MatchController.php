<?php

namespace App\Http\Controllers;

use App\Models\TournamentMatch;
use App\Models\MatchScore;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    /* =====================
       SHOW SCORE FORM
    ====================== */
    public function score(TournamentMatch $match)
    {
        if ($match->status === 'completed') {
            return back()->with('error', 'Match already completed');
        }

        return view('matches.score', compact('match'));
    }

    /* =====================
       STORE SCORE
    ====================== */
    public function storeScore(Request $request, TournamentMatch $match)
    {
        $request->validate([
            'team_one_score' => 'required|integer|min:0',
            'team_two_score' => 'required|integer|min:0',
        ]);

        if ($request->team_one_score === $request->team_two_score) {
            return back()->with('error', 'Draw is not allowed');
        }

        // Save scores
        MatchScore::create([
            'match_id' => $match->id,
            'team_id' => $match->team_one_id,
            'score' => $request->team_one_score,
        ]);

        MatchScore::create([
            'match_id' => $match->id,
            'team_id' => $match->team_two_id,
            'score' => $request->team_two_score,
        ]);

        // Decide winner
        $winnerId = $request->team_one_score > $request->team_two_score
            ? $match->team_one_id
            : $match->team_two_id;

        $match->update([
            'winner_id' => $winnerId,
            'status' => 'completed',
        ]);

        return redirect()
            ->route('tournaments.show', $match->tournament_id)
            ->with('success', 'Match result saved');
    }
}
