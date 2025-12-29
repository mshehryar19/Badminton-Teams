<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    protected $fillable = ['name', 'max_teams', 'status'];

    public function teams()
    {
        return $this->belongsToMany(
            Team::class,
            'tournament_team' 
        );
    }

    public function matches()
    {
        return $this->hasMany(TournamentMatch::class, 'tournament_id');
    }
}
