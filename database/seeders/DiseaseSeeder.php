<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiseaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tableName = 'diseases';

        $rows = [
            [
                'name' => 'Grey Leaf Spot'
            ],
            [
                'name' => 'Spear Rot'
            ],
            [
                'name' => 'Brown Leaf'
            ],
            [
                'name' => 'Pre-Emergent Shoot Rot'
            ],
            [
                'name' => 'Bud Rot'
            ],
            [
                'name' => 'Layu Natuna'
            ],
            [
                'name' => 'Leaf Blotch'
            ],
            [
                'name' => 'Karat Batang'
            ],
            [
                'name' => 'Busuk Akar'
            ],
            [
                'name' => 'Penyakit Akar'
            ],
            [
                'name' => 'Rontok Buah'
            ],
            [
                'name' => 'Layu Kuning'
            ]
        ];

        foreach($rows as $row) {
            DB::table($tableName)->insert($row);
        }
    }
}
