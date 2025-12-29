<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MatchScore extends Model
{
    protected $fillable = ['match_id', 'team_id', 'score'];

    public function match()
    {
        return $this->belongsTo(TournamentMatch::class);
    }
}

