<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KnownCaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tableName = 'known_cases';

        $rows = [
            [
                'created_at'    => date('Y-m-d H:i:s'),
                'symptoms'      => '1 2',
                'disease'       => 1,
                'solutions'     => '1'
            ],
            [
                'created_at'    => date('Y-m-d H:i:s'),
                'symptoms'      => '3 26',
                'disease'       => 2,
                'solutions'     => '2'
            ],
            [
                'created_at'    => date('Y-m-d H:i:s'),
                'symptoms'      => '4 27',
                'disease'       => 3,
                'solutions'     => '3'
            ],
            [
                'created_at'    => date('Y-m-d H:i:s'),
                'symptoms'      => '5',
                'disease'       => 4,
                'solutions'     => '4 5'
            ],
            [
                'created_at'    => date('Y-m-d H:i:s'),
                'symptoms'      => '6 7 8',
                'disease'       => 5,
                'solutions'     => '20'
            ],
            [
                'created_at'    => date('Y-m-d H:i:s'),
                'symptoms'      => '9 10',
                'disease'       => 6,
                'solutions'     => '6 7 8 9 10'
            ],
            [
                'created_at'    => date('Y-m-d H:i:s'),
                'symptoms'      => '11 12',
                'disease'       => 7,
                'solutions'     => '11 12 13'
            ],
            [
                'created_at'    => date('Y-m-d H:i:s'),
                'symptoms'      => '13 14',
                'disease'       => 8,
                'solutions'     => '14'
            ],
            [
                'created_at'    => date('Y-m-d H:i:s'),
                'symptoms'      => '15',
                'disease'       => 9,
                'solutions'     => '15 16'
            ],
            [
                'created_at'    => date('Y-m-d H:i:s'),
                'symptoms'      => '16 17',
                'disease'       => 10,
                'solutions'     => '17'
            ],
            [
                'created_at'    => date('Y-m-d H:i:s'),
                'symptoms'      => '18 19',
                'disease'       => 11,
                'solutions'     => '18 2'
            ],
            [
                'created_at'    => date('Y-m-d H:i:s'),
                'symptoms'      => '21 22 23 24 25',
                'disease'       => 12,
                'solutions'     => '19'
            ]
        ];

        foreach($rows as $row) {
            DB::table($tableName)->insert($row);
        }
    }
}
