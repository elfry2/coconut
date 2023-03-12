<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SolutionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tableName = 'solutions';

        $rows = [
            [
                'name' => 'Bibit disemprot dengan fungisida misalnya Dithane M-45 atau Perenox dengan dosis 0.1-0.2%'
            ],
            [
                'name' => 'Semprot bibit atau tanaman muda dengan fungisida yang mengandung senyawa Cu, misalnya Bubur Bordo atau Koper Oxyclorida'
            ],
            [
                'name' => 'Semprot bibit atau tanaman muda yang baru dipindahkan dengan fungisida Difolatan 4F, Dithane M-45 atau Daconil 75 WP'
            ],
            [
                'name' => 'Sebelum benih disemaikan sebaiknya didesinfektir dahulu dengan fungsida (Difolatan 4F)'
            ],
            [
                'name' => 'Sanitasi dan menghindarkan terjadinya kelembaban yang terlalu tinggi dipersemaian'
            ],
            [
                'name' => 'Penataan air tanah dengan membuat saluran-saluran drainase'
            ],
            [
                'name' => 'Pengolahan tanah yang baik'
            ],
            [
                'name' => 'Karantina tanaman'
            ],
            [
                'name' => 'Menanam bibit yang sehat, subur dan kuat'
            ],
            [
                'name' => 'Membongkar dan membinasakan tanaman yang terserang penyakit'
            ],
            [
                'name' => 'Semprotlah bibit atau tanaman muda dengan fungisida seperti Benlate, Dithane M-45, atau lainnya'
            ],
            [
                'name' => 'Daun yang terserang sebaiknya dipotong dan dibakar'
            ],
            [
                'name' => 'Hindarilah terjadinya kelembaban yang terlalu tinggi'
            ],
            [
                'name' => 'Menyayat atau mengerok bagian yang rusak, tutup denagn penutup luka(misalnya ter)'
            ],
            [
                'name' => 'Perniakan sifat-sifat fisik tanah dan pembuatan saluran-saluran drainase'
            ],
            [
                'name' => 'Pohon yang terserang penyakit dibongkar dan dibakar pada tempat yang terpisah'
            ],
            [
                'name' => 'Dengan cara kultur teknis dan sanitasi seperti yang dilakukan pada penyakit layu natuna'
            ],
            [
                'name' => 'Pemupukan yang teratur dan pemberian air pada musim kemarau'
            ],
            [
                'name' => 'Dilaksanakan melalui perbaikan sanitasi, kultur teknis dan tindakan lain'
            ],
            [
                'name' => 'Belum diketahui'
            ]
        ];

        foreach($rows as $row) {
            DB::table($tableName)->insert($row);
        }
    }
}
