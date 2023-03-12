<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $items = [
        [
          'category'=>'Consumable',
          'name'=>'CANON CL 831 COLOUR',
          'unit'=>'pcs',
          'price'=>275000
        ],
        [
          'category'=>'Consumable',
          'name'=>'CANON PG 740 BLACK',
          'unit'=>'pcs',
          'price'=>250000
        ],
        [
          'category'=>'Consumable',
          'name'=>'CANON PG 741 COLOUR',
          'unit'=>'pcs',
          'price'=>275000
        ],
        [
          'category'=>'Consumable',
          'name'=>'CANON PG 811 COLOR',
          'unit'=>'buah',
          'price'=>255000
        ],
        [
          'category'=>'Consumable',
          'name'=>'CANON PG 830 COLOR',
          'unit'=>'pcs',
          'price'=>0
        ],
        [
          'category'=>'Consumable',
          'name'=>'E-PRINT 200 ML',
          'unit'=>'buah',
          'price'=>50600
        ],
        [
          'category'=>'Consumable',
          'name'=>'HP 802 BLACK',
          'unit'=>'pcs',
          'price'=>120000
        ],
        [
          'category'=>'Consumable',
          'name'=>'HP 802 COLOUR',
          'unit'=>'pcs',
          'price'=>135000
        ],
        [
          'category'=>'Consumable',
          'name'=>'KERTAS ANTRIAN',
          'unit'=>'bh',
          'price'=>25133
        ],
        [
          'category'=>'Consumable',
          'name'=>'KERTAS F4',
          'unit'=>'rim',
          'price'=>65000
        ],
        [
          'category'=>'Consumable',
          'name'=>'KERTAS HVS A4',
          'unit'=>'rim',
          'price'=>45000
        ],
        [
          'category'=>'Consumable',
          'name'=>'ORI GT51 BLACK',
          'unit'=>'pcs',
          'price'=>100000
        ],
        [
          'category'=>'Consumable',
          'name'=>'ORI GT52 CYAN',
          'unit'=>'pcs',
          'price'=>100000
        ],
        [
          'category'=>'Consumable',
          'name'=>'ORI GT52 MAGENTA',
          'unit'=>'pcs',
          'price'=>100000
        ],
        [
          'category'=>'Consumable',
          'name'=>'ORI GT52 YELLOW',
          'unit'=>'pcs',
          'price'=>100000
        ],
        [
          'category'=>'Consumable',
          'name'=>'ORI L3110 BLACK',
          'unit'=>'pcs',
          'price'=>95000
        ],
        [
          'category'=>'Consumable',
          'name'=>'ORI L3110 CYAN',
          'unit'=>'pcs',
          'price'=>95000
        ],
        [
          'category'=>'Consumable',
          'name'=>'ORI L3110 MAGENTA',
          'unit'=>'pcs',
          'price'=>95000
        ],
        [
          'category'=>'Consumable',
          'name'=>'ORI L3110 YELLOW',
          'unit'=>'pcs',
          'price'=>95000
        ],
        [
          'category'=>'Consumable',
          'name'=>'ORI TONER CF26A',
          'unit'=>'pcs',
          'price'=>1700000
        ],
        [
          'category'=>'Consumable',
          'name'=>'ORIGINAL CANON PG 810 BLACK',
          'unit'=>'buah',
          'price'=>200000
        ],
        [
          'category'=>'Consumable',
          'name'=>'ORIGINAL EPSON L100/200 BLACK',
          'unit'=>'pcs',
          'price'=>98000
        ],
        [
          'category'=>'Consumable',
          'name'=>'ORIGINAL EPSON L100/200 CYAN',
          'unit'=>'pcs',
          'price'=>98000
        ],
        [
          'category'=>'Consumable',
          'name'=>'ORIGINAL EPSON L100/200 MAGENTA',
          'unit'=>'pcs',
          'price'=>88000
        ],
        [
          'category'=>'Consumable',
          'name'=>'ORIGINAL EPSON L100/200 YELLOW',
          'unit'=>'pcs',
          'price'=>98000
        ],
        [
          'category'=>'Consumable',
          'name'=>'ORIGINAL RIBBON EPSON LQ2190',
          'unit'=>'buah',
          'price'=>135000
        ],
        [
          'category'=>'Consumable',
          'name'=>'ORIGINAL TONER HP 17 A',
          'unit'=>'pcs',
          'price'=>920000
        ],
        [
          'category'=>'Consumable',
          'name'=>'ORI TONER HP CF510 BLACK',
          'unit'=>'pcs',
          'price'=>800000
        ],
        [
          'category'=>'Consumable',
          'name'=>'ORI TONER HP CF511 CYAN',
          'unit'=>'pcs',
          'price'=>880000
        ],
        [
          'category'=>'Consumable',
          'name'=>'ORI TONER HP CF512 YELLOW',
          'unit'=>'pcs',
          'price'=>880000
        ],
        [
          'category'=>'Consumable',
          'name'=>'ORI TONER HP CF513 MAGENTA',
          'unit'=>'pcs',
          'price'=>880000
        ],
        [
          'category'=>'Consumable',
          'name'=>'REFFIL TONER 76A',
          'unit'=>'pcs',
          'price'=>120000
        ],
        [
          'category'=>'Consumable',
          'name'=>'REFFIL TONER 130 A BLACK',
          'unit'=>'pcs',
          'price'=>67500
        ],
        [
          'category'=>'Consumable',
          'name'=>'REFFIL TONER 130 A COLOR',
          'unit'=>'pcs',
          'price'=>67500
        ],
        [
          'category'=>'Consumable',
          'name'=>'REFFIL TONER 17 A',
          'unit'=>'pcs',
          'price'=>70000
        ],
        [
          'category'=>'Consumable',
          'name'=>'REFFIL TONER 201A BLACK',
          'unit'=>'pcs',
          'price'=>165000
        ],
        [
          'category'=>'Consumable',
          'name'=>'REFFIL TONER 201A YELLOW',
          'unit'=>'pcs',
          'price'=>165000
        ],
        [
          'category'=>'Consumable',
          'name'=>'REFFIL TONER 204A BLACK',
          'unit'=>'pcs',
          'price'=>165000
        ],
        [
          'category'=>'Consumable',
          'name'=>'REFFIL TONER 83A',
          'unit'=>'pcs',
          'price'=>90000
        ],
        [
          'category'=>'Consumable',
          'name'=>'REFFIL TONER CB540B',
          'unit'=>'pcs',
          'price'=>165000
        ],
        [
          'category'=>'Consumable',
          'name'=>'REFFIL TONER CF26A',
          'unit'=>'pcs',
          'price'=>120000
        ],
        [
          'category'=>'Consumable',
          'name'=>'REFFIL TONER CF351A',
          'unit'=>'pcs',
          'price'=>145000
        ],
        [
          'category'=>'Consumable',
          'name'=>'REFFIL TONER HP CF510A BLACK (204 A Black)',
          'unit'=>'pcs',
          'price'=>120000
        ],
        [
          'category'=>'Consumable',
          'name'=>'REFFIL TONER HP CF511A CYAN',
          'unit'=>'pcs',
          'price'=>120000
        ],
        [
          'category'=>'Consumable',
          'name'=>'REFFIL TONER HP CF512A YELLOW',
          'unit'=>'pcs',
          'price'=>120000
        ],
        [
          'category'=>'Consumable',
          'name'=>'REFFIL TONER HP CF513A MAGENTA',
          'unit'=>'pcs',
          'price'=>120000
        ],
        [
          'category'=>'Consumable',
          'name'=>'REFFIL 201 A CYAN',
          'unit'=>'buah',
          'price'=>135000
        ],
        [
          'category'=>'Consumable',
          'name'=>'REFFIL 201 A MAGENTA',
          'unit'=>'buah',
          'price'=>135000
        ],
        [
          'category'=>'Consumable',
          'name'=>'REFFIL 204 A CYAN',
          'unit'=>'buah',
          'price'=>135000
        ],
        [
          'category'=>'Consumable',
          'name'=>'REFFIL 204 A MAGENTA',
          'unit'=>'buah',
          'price'=>135000
        ],
        [
          'category'=>'Consumable',
          'name'=>'REFFIL 204 A YELLOW',
          'unit'=>'buah',
          'price'=>135000
        ],
        [
          'category'=>'Consumable',
          'name'=>'REFFIL CANON 830 BLACK',
          'unit'=>'pcs',
          'price'=>65000
        ],
        [
          'category'=>'Consumable',
          'name'=>'REFFIL CANON 831 COLOUR',
          'unit'=>'pcs',
          'price'=>0
        ],
        [
          'category'=>'Consumable',
          'name'=>'REFFIL TONER 12 A',
          'unit'=>'pcs',
          'price'=>120000
        ],
        [
          'category'=>'Consumable',
          'name'=>'REFFIL TONER 35A',
          'unit'=>'buah',
          'price'=>90000
        ],
        [
          'category'=>'Consumable',
          'name'=>'REFFIL TONER HP 85 A',
          'unit'=>'pcs',
          'price'=>110000
        ],
        [
          'category'=>'Consumable',
          'name'=>'REFFIL CANON 310B',
          'unit'=>'pcs',
          'price'=>110000
        ],
        [
          'category'=>'Consumable',
          'name'=>'REFFIL CANON 311C',
          'unit'=>'pcs',
          'price'=>110000
        ],
        [
          'category'=>'Consumable',
          'name'=>'REFFIL CANON 312Y',
          'unit'=>'pcs',
          'price'=>110000
        ],
        [
          'category'=>'Consumable',
          'name'=>'REFFIL CANON 313M',
          'unit'=>'pcs',
          'price'=>110000
        ],
        [
          'category'=>'Consumable',
          'name'=>'TINTA 673 C',
          'unit'=>'btl',
          'price'=>82000
        ],
        [
          'category'=>'Consumable',
          'name'=>'TINTA 673 M',
          'unit'=>'btl',
          'price'=>82000
        ],
        [
          'category'=>'Consumable',
          'name'=>'TINTA 673 Y',
          'unit'=>'btl',
          'price'=>82000
        ],
        [
          'category'=>'Consumable',
          'name'=>'TONER 12 A',
          'unit'=>'pcs',
          'price'=>990000
        ],
        [
          'category'=>'Consumable',
          'name'=>'TONER 35 A',
          'unit'=>'buah',
          'price'=>910000
        ],
        [
          'category'=>'Consumable',
          'name'=>'TONER 83 A BLACK/CF283A',
          'unit'=>'pcs',
          'price'=>920000
        ],
        [
          'category'=>'Consumable',
          'name'=>'TONER HP 78 COLOR',
          'unit'=>'pcs',
          'price'=>120000
        ],
        [
          'category'=>'Consumable',
          'name'=>'DRUM HP CF400',
          'unit'=>'pcs',
          'price'=>75000
        ],
        [
          'category'=>'Consumable',
          'name'=>'DRUM HP CE314',
          'unit'=>'pcs',
          'price'=>115000
        ],
        [
          'category'=>'Consumable',
          'name'=>'CHIP M154C',
          'unit'=>'pcs',
          'price'=>20000
        ],
        [
          'category'=>'Consumable',
          'name'=>'CHIP M154Y',
          'unit'=>'pcs',
          'price'=>20000
        ],
        [
          'category'=>'Consumable',
          'name'=>'CHIP CP10',
          'unit'=>'pcs',
          'price'=>40000
        ],
        [
          'category'=>'Consumable',
          'name'=>'DV HP CB540',
          'unit'=>'pcs',
          'price'=>70000
        ],
        [
          'category'=>'Consumable',
          'name'=>'ORIGINAL TONER HP 76 A',
          'unit'=>'pcs',
          'price'=>1750000
        ],
        [
          'category'=>'ATK',
          'name'=>'Acco/Paper Fastener',
          'unit'=>'kotak',
          'price'=>16000
        ],
        [
          'category'=>'ATK',
          'name'=>'Amplop Dinas Coklat',
          'unit'=>'pack',
          'price'=>35000
        ],
        [
          'category'=>'ATK',
          'name'=>'Amplop Putih Polos',
          'unit'=>'ktk',
          'price'=>26000
        ],
        [
          'category'=>'ATK',
          'name'=>'Anak hekter besar',
          'unit'=>'ktk',
          'price'=>3500
        ],
        [
          'category'=>'ATK',
          'name'=>'Anak hekter kecil No. 10',
          'unit'=>'kotak',
          'price'=>1800
        ],
        [
          'category'=>'ATK',
          'name'=>'Atom No. 3',
          'unit'=>'ktk',
          'price'=>5500
        ],
        [
          'category'=>'ATK',
          'name'=>'Baterai jam',
          'unit'=>'bh',
          'price'=>6000
        ],
        [
          'category'=>'ATK',
          'name'=>'Baterai Remote/kecil',
          'unit'=>'bh',
          'price'=>6000
        ],
        [
          'category'=>'ATK',
          'name'=>'Binder klip 260',
          'unit'=>'kotak',
          'price'=>16000
        ],
        [
          'category'=>'ATK',
          'name'=>'Binder klip Besar uk. 200',
          'unit'=>'kotak',
          'price'=>14000
        ],
        [
          'category'=>'ATK',
          'name'=>'Binder klip kecil uk. 111',
          'unit'=>'kotak',
          'price'=>78000
        ],
        [
          'category'=>'ATK',
          'name'=>'Binder klip kecil uk. 107',
          'unit'=>'kotak',
          'price'=>55000
        ],
        [
          'category'=>'ATK',
          'name'=>'Buku isi 200',
          'unit'=>'bh',
          'price'=>45000
        ],
        [
          'category'=>'ATK',
          'name'=>'Buku Ekspedisi',
          'unit'=>'buah',
          'price'=>9667
        ],
        [
          'category'=>'ATK',
          'name'=>'Buku kas Isi 100',
          'unit'=>'bk',
          'price'=>0
        ],
        [
          'category'=>'ATK',
          'name'=>'Buku kas polio lunak',
          'unit'=>'bh',
          'price'=>0
        ],
        [
          'category'=>'ATK',
          'name'=>'Double Tape Busa',
          'unit'=>'pcs',
          'price'=>16000
        ],
        [
          'category'=>'ATK',
          'name'=>'Double Tipe Putih Kecil',
          'unit'=>'pcs',
          'price'=>6000
        ],
        [
          'category'=>'ATK',
          'name'=>'Gunting sedang',
          'unit'=>'buah',
          'price'=>12000
        ],
        [
          'category'=>'ATK',
          'name'=>'Hekter besar',
          'unit'=>'kotak',
          'price'=>36000
        ],
        [
          'category'=>'ATK',
          'name'=>'Hekter Sedang No. 10',
          'unit'=>'kotak',
          'price'=>18000
        ],
        [
          'category'=>'ATK',
          'name'=>'Isi Mekanikal Pensil Lead',
          'unit'=>'buah',
          'price'=>3917
        ],
        [
          'category'=>'ATK',
          'name'=>'Isi Pena Balliner/Signo',
          'unit'=>'bh',
          'price'=>11000
        ],
        [
          'category'=>'ATK',
          'name'=>'Isolasi bening besar',
          'unit'=>'pcs',
          'price'=>14000
        ],
        [
          'category'=>'ATK',
          'name'=>'Isolasi bening Kecil',
          'unit'=>'pcs',
          'price'=>6000
        ],
        [
          'category'=>'ATK',
          'name'=>'Isolasi Coklat Besar',
          'unit'=>'pcs',
          'price'=>14000
        ],
        [
          'category'=>'ATK',
          'name'=>'Isolasi Hitam Besar',
          'unit'=>'pcs',
          'price'=>22000
        ],
        [
          'category'=>'ATK',
          'name'=>'Isolasi Kuning Besar',
          'unit'=>'pcs',
          'price'=>22000
        ],
        [
          'category'=>'ATK',
          'name'=>'Kertas Bufallo Putih',
          'unit'=>'pcs',
          'price'=>37000
        ],
        [
          'category'=>'ATK',
          'name'=>'Kertas F4',
          'unit'=>'rim',
          'price'=>65000
        ],
        [
          'category'=>'ATK',
          'name'=>'Kertas Fax',
          'unit'=>'buah',
          'price'=>13500
        ],
        [
          'category'=>'ATK',
          'name'=>'Kertas Struk',
          'unit'=>'kotak',
          'price'=>3500
        ],
        [
          'category'=>'ATK',
          'name'=>'Kertas Concord',
          'unit'=>'rim',
          'price'=>2500
        ],
        [
          'category'=>'ATK',
          'name'=>'Kotak Kardus Acrylic uk. 70x50, tebal 6cm',
          'unit'=>'pcs',
          'price'=>75000
        ],
        [
          'category'=>'ATK',
          'name'=>'Kwitansi Besar',
          'unit'=>'bk',
          'price'=>10000
        ],
        [
          'category'=>'ATK',
          'name'=>'Kwitansi Kecil',
          'unit'=>'bk',
          'price'=>5000
        ],
        [
          'category'=>'ATK',
          'name'=>'Lem Stick',
          'unit'=>'buah',
          'price'=>8500
        ],
        [
          'category'=>'ATK',
          'name'=>'Magnet Tempel Didinding',
          'unit'=>'set',
          'price'=>10000
        ],
        [
          'category'=>'ATK',
          'name'=>'Map Batik',
          'unit'=>'pcs',
          'price'=>7000
        ],
        [
          'category'=>'ATK',
          'name'=>'Map Branding BPJS',
          'unit'=>'bh',
          'price'=>4300
        ],
        [
          'category'=>'ATK',
          'name'=>'Map Cheklis JHT',
          'unit'=>'rim',
          'price'=>85000
        ],
        [
          'category'=>'ATK',
          'name'=>'Map gantung',
          'unit'=>'ktk',
          'price'=>165000
        ],
        [
          'category'=>'ATK',
          'name'=>'Map Gantung Bantex',
          'unit'=>'pcs',
          'price'=>11000
        ],
        [
          'category'=>'ATK',
          'name'=>'Map Plastik',
          'unit'=>'pcs',
          'price'=>2000
        ],
        [
          'category'=>'ATK',
          'name'=>'Map Tulang Plastik',
          'unit'=>'lsn',
          'price'=>78000
        ],
        [
          'category'=>'ATK',
          'name'=>'Mekanikal Pensil Lead',
          'unit'=>'buah',
          'price'=>5000
        ],
        [
          'category'=>'ATK',
          'name'=>'Note Marker/Pembatas tanda tangan',
          'unit'=>'bh',
          'price'=>8000
        ],
        [
          'category'=>'ATK',
          'name'=>'Paper Clips/Atom No. 1',
          'unit'=>'ktk',
          'price'=>55000
        ],
        [
          'category'=>'ATK',
          'name'=>'Pena BalinerSigno',
          'unit'=>'buah',
          'price'=>21000
        ],
        [
          'category'=>'ATK',
          'name'=>'Pena Debozz Black',
          'unit'=>'ktk',
          'price'=>2667
        ],
        [
          'category'=>'ATK',
          'name'=>'Pena Faster / biasa',
          'unit'=>'buah',
          'price'=>2167
        ],
        [
          'category'=>'ATK',
          'name'=>'Pena Meja',
          'unit'=>'ktk',
          'price'=>8000
        ],
        [
          'category'=>'ATK',
          'name'=>'Pena My Gel',
          'unit'=>'buah',
          'price'=>6500
        ],
        [
          'category'=>'ATK',
          'name'=>'Pena Signo',
          'unit'=>'ktk',
          'price'=>252000
        ],
        [
          'category'=>'ATK',
          'name'=>'Penggaris Besi',
          'unit'=>'buah',
          'price'=>5000
        ],
        [
          'category'=>'ATK',
          'name'=>'Penghapus',
          'unit'=>'buah',
          'price'=>2000
        ],
        [
          'category'=>'ATK',
          'name'=>'Penghapus Papan Tulis',
          'unit'=>'bh',
          'price'=>6000
        ],
        [
          'category'=>'ATK',
          'name'=>'Pensil Faber Castell 2B',
          'unit'=>'ktk',
          'price'=>4000
        ],
        [
          'category'=>'ATK',
          'name'=>'Pisau cutter',
          'unit'=>'buah',
          'price'=>8000
        ],
        [
          'category'=>'ATK',
          'name'=>'Plastik Laminating F4',
          'unit'=>'pak',
          'price'=>105000
        ],
        [
          'category'=>'ATK',
          'name'=>'Post it Besar',
          'unit'=>'buah',
          'price'=>8000
        ],
        [
          'category'=>'ATK',
          'name'=>'Rautan Pensil',
          'unit'=>'bh',
          'price'=>1400
        ],
        [
          'category'=>'ATK',
          'name'=>'Spidol Non Permanent',
          'unit'=>'kotak',
          'price'=>8500
        ],
        [
          'category'=>'ATK',
          'name'=>'Spidol Permanen',
          'unit'=>'kotak',
          'price'=>8500
        ],
        [
          'category'=>'ATK',
          'name'=>'Stabillo',
          'unit'=>'ktk',
          'price'=>10500
        ],
        [
          'category'=>'ATK',
          'name'=>'Stempel Tanggal',
          'unit'=>'pcs',
          'price'=>375000
        ],
        [
          'category'=>'ATK',
          'name'=>'Stick Notes Warna Warni',
          'unit'=>'pcs',
          'price'=>8000
        ],
        [
          'category'=>'ATK',
          'name'=>'Tali ID Card',
          'unit'=>'pcs',
          'price'=>5000
        ],
        [
          'category'=>'ATK',
          'name'=>'Tinta Stempel Kayu',
          'unit'=>'btl',
          'price'=>16000
        ],
        [
          'category'=>'ATK',
          'name'=>'Tinta Stempel Merah',
          'unit'=>'btl',
          'price'=>15000
        ],
        [
          'category'=>'ATK',
          'name'=>'Tinta Stempel otomatis (biru)',
          'unit'=>'btl',
          'price'=>15000
        ],
        [
          'category'=>'ATK',
          'name'=>'Tip-Ex',
          'unit'=>'kotak',
          'price'=>78000
        ],
        [
          'category'=>'ATK',
          'name'=>'Kertas Roll Antrian',
          'unit'=>'kotak',
          'price'=>22000
        ],
        [
          'category'=>'Cetakan',
          'name'=>'Amplop Coklat Uk. 240 x 350 mm (Folio/F4)',
          'unit'=>'kotak',
          'price'=>115000
        ],
        [
          'category'=>'Cetakan',
          'name'=>'Amplop Coklat Uk. 210 x 270 mm (Kwarto)',
          'unit'=>'kotak',
          'price'=>90000
        ],
        [
          'category'=>'Cetakan',
          'name'=>'Amplop Coklat Uk. 290 x 390 mm (A3)',
          'unit'=>'kotak',
          'price'=>140000
        ],
        [
          'category'=>'Cetakan',
          'name'=>'Amplop Jendela/Kaca Logo',
          'unit'=>'kotak',
          'price'=>75000
        ],
        [
          'category'=>'Cetakan',
          'name'=>'Brosur Jadwal Imsakiyah',
          'unit'=>'rim',
          'price'=>550000
        ],
        [
          'category'=>'Cetakan',
          'name'=>'Brosur JKP',
          'unit'=>'rim',
          'price'=>1050
        ],
        [
          'category'=>'Cetakan',
          'name'=>'Brosur PU',
          'unit'=>'bks',
          'price'=>60000
        ],
        [
          'category'=>'Cetakan',
          'name'=>'Brosur BPU',
          'unit'=>'bks',
          'price'=>55000
        ],
        [
          'category'=>'Cetakan',
          'name'=>'Check List Klaim Jaminan Hari tua',
          'unit'=>'rim',
          'price'=>85000
        ],
        [
          'category'=>'Cetakan',
          'name'=>'Check List Klaim Jaminan Kecelakaan Kerja',
          'unit'=>'rim',
          'price'=>85000
        ],
        [
          'category'=>'Cetakan',
          'name'=>'Check List Klaim Jaminan Kematian',
          'unit'=>'rim',
          'price'=>85000
        ],
        [
          'category'=>'Cetakan',
          'name'=>'Daftar Periksa Klaim JHT',
          'unit'=>'rim',
          'price'=>85000
        ],
        [
          'category'=>'Cetakan',
          'name'=>'Form Pendaftaran Proyek Konstruksi (F1)-Lama',
          'unit'=>'buku',
          'price'=>55000
        ],
        [
          'category'=>'Cetakan',
          'name'=>'Form Pendaftaran Proyek Konstruksi (F1)',
          'unit'=>'buku',
          'price'=>60000
        ],
        [
          'category'=>'Cetakan',
          'name'=>'Formulir Berita Acara Pemeriksaan (BAP) NCR R3',
          'unit'=>'buku',
          'price'=>42000
        ],
        [
          'category'=>'Cetakan',
          'name'=>'Formulir (F1a) JAKON - Lama',
          'unit'=>'buku',
          'price'=>27500
        ],
        [
          'category'=>'Cetakan',
          'name'=>'Formulir Daftar Harga Satuan Upah TK (F1a) JAKON',
          'unit'=>'buku',
          'price'=>60000
        ],
        [
          'category'=>'Cetakan',
          'name'=>'Formulir F1a1 JAKON',
          'unit'=>'buku',
          'price'=>60000
        ],
        [
          'category'=>'Cetakan',
          'name'=>'Formulir F2 PU',
          'unit'=>'buku',
          'price'=>30000
        ],
        [
          'category'=>'Cetakan',
          'name'=>'Formulir 1 BPU Mitra',
          'unit'=>'buku',
          'price'=>27000
        ],
        [
          'category'=>'Cetakan',
          'name'=>'Formulir F1 PN',
          'unit'=>'buku',
          'price'=>27000
        ],
        [
          'category'=>'Cetakan',
          'name'=>'Formulir 1a BPU',
          'unit'=>'buku',
          'price'=>27500
        ],
        [
          'category'=>'Cetakan',
          'name'=>'Formulir 1b BPU',
          'unit'=>'buku',
          'price'=>27000
        ],
        [
          'category'=>'Cetakan',
          'name'=>'Formulir 2a BPU',
          'unit'=>'buku',
          'price'=>27000
        ],
        [
          'category'=>'Cetakan',
          'name'=>'Formulir F5 (Pengajuan Pembayaran JHT) - Lama',
          'unit'=>'buku',
          'price'=>27500
        ],
        [
          'category'=>'Cetakan',
          'name'=>'Formulir F5 (Pengajuan Pembayaran JHT)',
          'unit'=>'buku',
          'price'=>30000
        ],
        [
          'category'=>'Cetakan',
          'name'=>'Formulir F1 PU',
          'unit'=>'buku',
          'price'=>30000
        ],
        [
          'category'=>'Cetakan',
          'name'=>'Formulir F1a PU - Lama',
          'unit'=>'buku',
          'price'=>27500
        ],
        [
          'category'=>'Cetakan',
          'name'=>'Formulir F1a PU',
          'unit'=>'buku',
          'price'=>30000
        ],
        [
          'category'=>'Cetakan',
          'name'=>'Formulir F1b PU',
          'unit'=>'buku',
          'price'=>30000
        ],
        [
          'category'=>'Cetakan',
          'name'=>'Formulir F2a PU',
          'unit'=>'buku',
          'price'=>27500
        ],
        [
          'category'=>'Cetakan',
          'name'=>'Formulir F3 PAK 1',
          'unit'=>'buku',
          'price'=>27500
        ],
        [
          'category'=>'Cetakan',
          'name'=>'Formulir F3a PAK 2',
          'unit'=>'buku',
          'price'=>54000
        ],
        [
          'category'=>'Cetakan',
          'name'=>'Formulir F4 Logo BPJS TK (JHT JKM)',
          'unit'=>'buku',
          'price'=>30000
        ],
        [
          'category'=>'Cetakan',
          'name'=>'Formulir F7 ( Pengajuan Pembayaran JP)',
          'unit'=>'buku',
          'price'=>30000
        ],
        [
          'category'=>'Cetakan',
          'name'=>'Formulir F7a',
          'unit'=>'buku',
          'price'=>30000
        ],
        [
          'category'=>'Cetakan',
          'name'=>'Formulir F6',
          'unit'=>'buku',
          'price'=>30000
        ],
        [
          'category'=>'Cetakan',
          'name'=>'Formulir F6a',
          'unit'=>'buku',
          'price'=>30000
        ],
        [
          'category'=>'Cetakan',
          'name'=>'Formulir F6b',
          'unit'=>'buku',
          'price'=>30000
        ],
        [
          'category'=>'Cetakan',
          'name'=>'Formulir F6c',
          'unit'=>'buku',
          'price'=>30000
        ],
        [
          'category'=>'Cetakan',
          'name'=>'Formulir KK1 - Lama',
          'unit'=>'buku',
          'price'=>75000
        ],
        [
          'category'=>'Cetakan',
          'name'=>'Formulir KK1',
          'unit'=>'buku',
          'price'=>60000
        ],
        [
          'category'=>'Cetakan',
          'name'=>'Formulir KK2 - Lama',
          'unit'=>'buku',
          'price'=>75000
        ],
        [
          'category'=>'Cetakan',
          'name'=>'Formulir KK2',
          'unit'=>'buku',
          'price'=>60000
        ],
        [
          'category'=>'Cetakan',
          'name'=>'Formulir KK3 - Lama',
          'unit'=>'buku',
          'price'=>75000
        ],
        [
          'category'=>'Cetakan',
          'name'=>'Formulir KK3',
          'unit'=>'buku',
          'price'=>60000
        ],
        [
          'category'=>'Cetakan',
          'name'=>'Formulir Permintaan Duplikat KPJ',
          'unit'=>'rim',
          'price'=>85000
        ],
        [
          'category'=>'Cetakan',
          'name'=>'Formulir Permintaan Penggabungan Saldo',
          'unit'=>'rim',
          'price'=>85000
        ],
        [
          'category'=>'Cetakan',
          'name'=>'Formulir Surat Pernyataan',
          'unit'=>'buku',
          'price'=>27000
        ],
        [
          'category'=>'Cetakan',
          'name'=>'Pengajuan Pembayaran Manfaat Beasiswa',
          'unit'=>'buku',
          'price'=>30000
        ],
        [
          'category'=>'Cetakan',
          'name'=>'Pengajuan Perubahan Anak Penerima Manfaat Beasiswa',
          'unit'=>'buku',
          'price'=>30000
        ],
        [
          'category'=>'Cetakan',
          'name'=>'ID Card Visitor',
          'unit'=>'bh',
          'price'=>25000
        ],
        [
          'category'=>'Cetakan',
          'name'=>'Kartu Nama',
          'unit'=>'kotak',
          'price'=>75000
        ],
        [
          'category'=>'Cetakan',
          'name'=>'Kertas Kado Logo BPJAMSOSTEK',
          'unit'=>'lbr',
          'price'=>1300
        ],
        [
          'category'=>'Cetakan',
          'name'=>'Kop Surat BPJS TK',
          'unit'=>'rim',
          'price'=>135000
        ],
        [
          'category'=>'Cetakan',
          'name'=>'Kwitansi BPJS Ketenagakerjaan R2',
          'unit'=>'buku',
          'price'=>27000
        ],
        [
          'category'=>'Cetakan',
          'name'=>'Lembar Disposisi',
          'unit'=>'buku',
          'price'=>15000
        ],
        [
          'category'=>'Cetakan',
          'name'=>'Lembar Kunjungan Perusahaan',
          'unit'=>'buku',
          'price'=>55000
        ],
        [
          'category'=>'Cetakan',
          'name'=>'Map Branding BPJSTK',
          'unit'=>'bh',
          'price'=>5500
        ],
        [
          'category'=>'Cetakan',
          'name'=>'Stempel Otomatis',
          'unit'=>'pcs',
          'price'=>80000
        ],
        [
          'category'=>'Cetakan',
          'name'=>'Stiker Barcode',
          'unit'=>'lbr',
          'price'=>12000
        ],
        [
          'category'=>'Materai',
          'name'=>'Rp. 10.000',
          'unit'=>'lbr',
          'price'=>10000
        ],
        [
          'category'=>'Rumah Tangga',
          'name'=>'Air minum',
          'unit'=>'galon',
          'price'=>20000
        ]
      ];

      foreach ($items as $item) {
        DB::table('items')->insert($item);
      }
    }
}
