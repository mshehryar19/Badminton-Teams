<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'team_name',
        'coach_name',
        'player1_name',
        'player2_name',
        'team_logo',
        'player1_image',
        'player2_image'
    ];
}
