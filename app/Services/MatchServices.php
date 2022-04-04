<?php

namespace App\Services;

use App\Models\Match;

class MatchServices {
    public function playAuto(Match $match) {
        $minimum_overall = min($match->left_team->overall, $match->right_team->overall);
        $factor = (int) ceil(105 / $minimum_overall);
        
        $ball_possessions = $this->getBallPossessions($match, $factor);

        return $this->play($match, $ball_possessions);
    }

    private function getBallPossessions(Match $match, int $factor) {
        $ball_possessions = collect();
    
        for ($i=0; $i<$match->left_team->overall * $factor; $i++) {
            $ball_possessions->push('left');
        }

        if (!$match->is_neutral) {
            for ($i=0; $i<5; $i++) { $ball_possessions->push('left'); }
        }

        for ($i=0; $i<$match->right_team->overall * $factor; $i++) {
            $ball_possessions->push('right');
        }

        return $ball_possessions;
    }

    private function play(Match $match, $ball_possessions) {
        $match->left_team_score = 0;
        $match->right_team_score = 0;
        $real_time = [];

        for ($time = 0; $time <= 45+rand(0,5); $time++) {
            $possession = $ball_possessions->random();
            $time_freeze = ($time > 45) ? '45+'.($time-45).'\'' : $time.'\'';

            $real_time[$time_freeze] = $this->doPlay($possession, $match);
        }

        for ($time = 46; $time <= 90+rand(3,10); $time++) {
            $possession = $ball_possessions->random();
            $time_freeze = ($time > 90) ? '90+'.($time-90).'\'' : $time.'\'';

            $real_time[$time_freeze] = $this->doPlay($possession, $match);
        }

        $match->real_time = json_encode($real_time);
        $match->save();

        return $match;
    }

    private function doPlay($possession, &$match) {
        $played = rand(0,30);
        if ($played == 1 && $possession == 'left') {
            $match->left_team_score++;
            $result = "{$match->left_team->acronym} {$match->left_team_score}x{$match->right_team_score} {$match->right_team->acronym}";
            $result = "{$result} - {$match->left_team->name} scores!";
        } elseif ($played == 1 && $possession == 'right') {
            $match->right_team_score++;
            $result = "{$match->left_team->acronym} {$match->left_team_score}x{$match->right_team_score} {$match->right_team->acronym}";
            $result = "{$result} - {$match->right_team->name} scores!";
        } else {
            $result = "{$match->left_team->acronym} {$match->left_team_score}x{$match->right_team_score} {$match->right_team->acronym}";
            if ($possession == 'left') {
                $result = "{$result} - {$match->left_team->name} possession";
            } else {
                $result = "{$result} - {$match->right_team->name} possession";
            }
        }

        return $result;
    }

    public function getStatistics(Match $match) {
        $real_time = json_decode($match->real_time, true);

        $statistics = ['ball_possession' => []];
        foreach ($real_time as $moment) {
            $possession = explode(' - ', $moment)[1];
            $possession = str_replace(' possession', '', $possession);
            $possession = str_replace(' scores!', '', $possession);
            try {
                $statistics['ball_possession'][$possession]++;
            } catch (\Exception $e) {
                $statistics['ball_possession'][$possession] = 1;
            }
        }

        $total_time = 0;
        $teams = array_keys($statistics['ball_possession']);
        foreach ($teams as $team) {
            $total_time = $total_time + $statistics['ball_possession'][$team];
        }
        foreach ($teams as $team) {
            $statistics['ball_possession'][$team] = (int) round($statistics['ball_possession'][$team] / $total_time * 100);
        }

        return $statistics;
    }
}