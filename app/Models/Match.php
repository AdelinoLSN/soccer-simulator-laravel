<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    use HasFactory;

    protected $fillable = [
        'left_team_id',
        'right_team_id',
        'left_team_score',
        'right_team_score',
        'is_neutral',
        'is_finished',
    ];

    public function left_team() {
        return $this->hasOne('App\Models\Team', 'id', 'left_team_id');
    }

    public function right_team() {
        return $this->hasOne('App\Models\Team', 'id', 'right_team_id');
    }
}
