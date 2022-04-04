<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Team;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teams_payload = [
            ['Bayern', 'BAY', 99],
            ['Manchester City', 'MCI', 98],
            ['Manchester United', 'MUN', 97],
            ['Liverpool', 'LIV', 96],
            ['Chelsea', 'CHE', 95],
            ['Tottenham', 'TOT', 94],
            ['Arsenal', 'ARS', 93],
            ['Burnley', 'BUR', 92],
            ['Everton', 'EVE', 90],
            ['Newcastle', 'NEW', 87],
            ['Brighton', 'BRI', 84],
            ['Cardiff', 'CAR', 78],
            ['Fulham', 'FUL', 77],
            ['Blackburn', 'BLA', 72],
            ['Bristol', 'BRI', 71],
            ['Southend', 'SOU', 68],
            ['Bolton', 'BOL', 62],
            ['Blackpool', 'BLA', 61],
            ['Plymouth', 'PLY', 60],
            ['Cambridge', 'CAM', 58],
            ['Ipswich', 'IPS', 57],
        ];

        foreach ($teams_payload as $team_payload) {
            Team::factory()->create([
                'name' => $team_payload[0],
                'acronym' => $team_payload[1],
                'overall' => $team_payload[2],
            ]);
        }
    }
}
