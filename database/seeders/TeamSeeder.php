<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamSeeder extends Seeder
{
    public function run(): void
    {
        $teams = [
            [
                'id' => 1,
                'spbu_id' => 1,
                'name' => 'Adi Setya W',
                'position' => 'Supervisor',
                'photo' => 'adi-setya-karangawenn.png',
                'order' => 1,
                'is_active' => 1,
            ],
            [
                'id' => 5,
                'spbu_id' => 3,
                'name' => 'Sigit Prasetyo',
                'position' => 'Kepala Operator',
                'photo' => 'sigit-bringin.png',
                'order' => 1,
                'is_active' => 1,
            ],
            [
                'id' => 6,
                'spbu_id' => 4,
                'name' => 'M.Jahuri',
                'position' => 'QQ&PENGAWAS',
                'photo' => 'jahuri.png',
                'order' => 1,
                'is_active' => 1,
            ],
            [
                'id' => 7,
                'spbu_id' => 4,
                'name' => 'Siswanto',
                'position' => 'KASIR',
                'photo' => 'siswanto.png',
                'order' => 2,
                'is_active' => 1,
            ],
            [
                'id' => 8,
                'spbu_id' => 3,
                'name' => 'Reva Arief',
                'position' => 'Staf QQ',
                'photo' => 'Reva-arief-bringin.png',
                'order' => 2,
                'is_active' => 1,
            ],
        ];

        foreach ($teams as $team) {
            $team['created_at'] = now();
            $team['updated_at'] = now();
            DB::table('teams')->insert($team);
        }
    }
}