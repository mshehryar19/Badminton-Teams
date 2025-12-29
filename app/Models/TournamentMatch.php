<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TournamentMatch extends Model
{

    protected $table = 'matches';
    
    protected $fillable = [
        'tournament_id',
        'team_one_id',
        'team_two_id',
        'winner_id',
        'round',
        'status',
    ];

    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }

    public function scores()
    {
        return $this->hasMany(MatchScore::class, 'match_id');
    }

    public function teamOne()
    {
        return $this->belongsTo(Team::class, 'team_one_id');
    }

    public function teamTwo()
    {
        return $this->belongsTo(Team::class, 'team_two_id');
    }

    public function winner()
    {
        return $this->belongsTo(Team::class, 'winner_id');
    }

}

