<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SymptomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tableName = 'symptoms';

        $rows = [
            [
                'name' => 'Timbul bercak-bercak yang tembus cahaya pada daun-daun dan kemudian berubah warna menjadi coklat kekuning-kuningan sampai kelabu'
            ],
            [
                'name' => 'Bercak-bercak bersatu membentuk bercak yang lebih besar yang terdapat bintik-bintik yang terdiri dari acervuli cendawan'
            ],
            [
                'name' => 'Pada becak terdapat bintik-bintik yang terdiri acervuli cendawan'
            ],
            [
                'name' => 'Pada permukaan daun timbul bercak-bercak bulat kecil yang kemudian bertambah besar dan berubah warna menjadi coklat tua'
            ],
            [
                'name' => 'Pada stadium infeksi awal jika sabutnya dibuka terlihat bercak-bercak dan lapisan miselia berwarna putih atau putih kemerah-merahan pada kuncup dan tepi bakal daun'
            ],
            [
                'name' => 'Mengeringnya daun-daun muda di tengah-tengah tajuk'
            ],
            [
                'name' => 'Daun berwarna coklat dan patah pada pangkalnya'
            ],
            [
                'name' => 'Pangkal membusuk, yang kemudian dapat mancapai titik tumbuh sehingga pertumbuhan tanaman terhenti dan mati'
            ],
            [
                'name' => 'Layu yang muncul secara tiba-tiba pada seluruh bagian daun mahkota. Kemudian warna berubah menjadi kusam, pelepah-pelepah bergantungan dan akrinya berguguran beriku tandan buahnya'
            ],
            [
                'name' => 'Proses kematian sangat cepat 1-3 bulan sejak gejala awal mulai muncul'
            ],
            [
                'name' => 'Proses kematian sangat cepat 1-3 bulan sejak gejala awal mulai muncul'
            ],
            [
                'name' => 'Bercak-becak meluas dengan cepat, dan warnanya berubah menjadi cokalt tua. Beberapa becak bersatu dan terjadi nekrosis besar memanjang tidak beraturan'
            ],
            [
                'name' => 'Batang menjadi rusak dan dari celah-celah batang yang berwarna karat akan keluar cairan, dimana jaringan pada bagian ini telah rusak'
            ],
            [
                'name' => 'Terjadi gangguan fisiologis yang mempengaruhi pertumbuhan'
            ],
            [
                'name' => 'Pada bagian pangkal batang terjadi pembusukan dan terlihat lubang dan bercak kecil pada bagian luar batang yang mengeluarkan cairan'
            ],
            [
                'name' => 'Adanya perubahan warna daun secara berangsur-angsur. Warna kuning pucat pada daun terbawah berangsur-angsur hilang ke bagian daun yang lebih muda'
            ],
            [
                'name' => 'Ujung-ujung daun mengkerut dan banyak yang kering. Gejala ini seperti gejala defisiensi unsur hara, karena terjadinya gangguan transportasi dalam jaringan tanaman'
            ],
            [
                'name' => 'Buah rontok'
            ],
            [
                'name' => 'Pada bagian pangkal buah terdapat bagian yang busuk'
            ],
            [
                'name' => 'Seluruh atau sebagian daun berwarna kuning terutama bila terkena sinar matahari'
            ],
            [
                'name' => 'Tanaman tumbuh kerdil, makin ke pucuk ukuran pelepah dan daun makin kecil'
            ],
            [
                'name' => 'Sebagian pelepah bagian atas kurus dan menekuk pada ujungnya dan sebagian pelepah bagian bawah menggantung dan kering'
            ],
            [
                'name' => 'Bunga dan bakal buah jarang sekali. Buah muda berguguran dan sedikit sekali yang sanggup menjadi tua. Ukuran buah kecil dan bersegi-segi tidak teratur'
            ],
            [
                'name' => 'Ukuran mayang yang tumbuh setelah pohon sakit lebih pendek dan kecil, merekah serta terbuka tidak sempurna. Adakalanya mayang yang masih terbungkus'
            ],
            [
                'name' => 'Membusuk menyerupai serangan penyakit busuk'
            ],
            [
                'name' => 'Daun yang terserang mati lebih cepat'
            ],
            [
                'name' => 'Bercak-bercak berubah menjadi lonjong dan memanjang'
            ]
        ];

        foreach($rows as $row) {
            DB::table($tableName)->insert($row);
        }
    }
}
