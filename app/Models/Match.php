<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Services\MatchServices;

class Match extends Model
{
    use HasFactory;

    protected $fillable = [
        'left_team_id',
        'right_team_id',
        'left_team_score',
        'right_team_score',
        'is_neutral',
        'is_played',
    ];

    public function left_team() {
        return $this->hasOne('App\Models\Team', 'id', 'left_team_id');
    }

    public function right_team() {
        return $this->hasOne('App\Models\Team', 'id', 'right_team_id');
    }

    public function playAuto() {
        return (new MatchServices())->playAuto($this);
    }

    public function getStatistics() {
        return (new MatchServices())->getStatistics($this);
    }
}
