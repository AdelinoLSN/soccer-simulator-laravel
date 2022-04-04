<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Match;
use App\Models\Team;

class MatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teams = Team::all();

        for ($i=0; $i<rand(10,30); $i++) {
            $left_team_id = $teams->random()->id;
            $right_team_id = $teams->random()->id;
            while ($left_team_id == $right_team_id) {
                $right_team_id = $teams->random()->id;
            }

            $match = Match::create([
                'left_team_id' => $left_team_id,
                'right_team_id' => $right_team_id,
                'is_neutral' => rand(0,1) ? true : false,
            ]);

            if (rand(0,2) == 1) {
                $match->update([
                    'left_team_score' => rand(0,7),
                    'right_team_score' => rand(0,7),
                    'is_played' => true,
                ]);
            }
        }
    }
}
