<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mapels = [
            'nama_mapel',
            'Matematika',
            'Fisika',
            'Kimia',
            'Tajwid',
            'TIK',
            'Khot'
        ];
        foreach ($mapels as $mapel) {

            DB::table('mapels')->insert([
                'nama_mapel' => $mapel,
            ]);
        }
    }
}
