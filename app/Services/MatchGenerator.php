<?php
namespace App\Services;

use App\Models\Tournament;
use App\Models\TournamentMatch;

class MatchGenerator
{
    public function generate(Tournament $tournament)
    {
        $teams = $tournament->teams()->pluck('teams.id')->shuffle()->toArray();

        // Pair teams
        for ($i = 0; $i < count($teams); $i += 2) {
            TournamentMatch::create([
                'tournament_id' => $tournament->id,
                'team_one_id' => $teams[$i],
                'team_two_id' => $teams[$i + 1],
                'round' => 1,
                'status' => 'scheduled',
            ]);
        }

        // Mark tournament as ongoing
        $tournament->update(['status' => 'ongoing']);
    }
}
