@extends('layouts.my-front')
@section('my-content-area')
    <div class="card mt-5">
        <div class="card-body">
            <h1>{{ env('APP_NAME') }}</h1>
            <div class="mt-4">
                <a href="{{ route('consultation.consult') }}" class="btn btn-primary">Konsultasi</a>
                <a href="{{ route('login') }}" class="btn">{{ Auth::user()->name ?? 'Masuk' }}</a>
            </div>
        </div>
    </div>
    <article class="mt-5">
        <p style="text-align: justify">Kelapa hijau (cocos nucifera) merupakan salah satu komoditas unggulan di
            banyak daerah di Indonesia. Berdasarkan data Dinas Perkebunan Kabupaten Indragiri Hilir, di Kabupaten
            Indragiri Hilir, Provinsi Riau pada tahun 2015, luas total perkebunan kelapa tercatat 391.884 hektare,
            dengan mayoritas jenis kelapanya ialah kelapa dalam. Dengan total luas tersebut, Kabupaten Indragiri
            Hilir mendapat julukan “Negeri Hamparan Kelapa Dunia” (Maifiandri, 2017). Di Kabupaten Asahan, Sumatera
            Utara, luas perkebunan kelapa mencapai 22.117,42 hektare, dengan produksi mencapai angka 22.848,10
            ton/tahun, membuatnya menjadi salah satu komoditas andalan di kabupaten tersebut, bersama kelapa sawit,
            karet, dan kakao (Christina, 2021). Minyak kelapa murni pada tanaman kelapa asal Papua memenuhi standar
            internasional dalam kandungan asam lemaknya (Pulung, 2016).</p>
        <p style="text-align: justify">Pada berbagai bagiannya, tanaman kelapa memiliki banyak manfaat dan nilai
            jual; buahnya dapat digunakan
            sebagai sumber makanan dan obat-obatan, daunnya dapat diolah menjadi berbagai macam bentuk karya
            kerajinan tangan, tempurungnya sebagai bahan bakar, dan lain-lain. Sebuah penelitian sebelumnya
            melaporkan bahwa virgin coconut oil dapat menghambat pertumbuhan sel kanker kolon pada manusia dan
            menghambat kerusakan oksidasi DNA lebih baik daripada minyak bunga matahari (Pulung, 2016). Penelitian
            tersebut
            juga melaporkan potensi VCO sebagai antioksidan dan penghambat pertumbuhan bakteri e. coli dan
            staphylococcus aureus, menambah panjangnya daftar manfaat yang dapat diperoleh dari tanaman kelapa.</p>
        <p style="text-align: justify">Kelapa, sebagaimana kebanyakan tanaman lainnya, jika tidak semua, juga dapat
            terpapar pada berbagai macam
            penyakit. Penyakit-penyakit yang dapat menjangkiti tanaman kelapa diklasifikasikan ke dalam penyakit
            yang menyerang bibit, penyakit yang menyerang tanaman muda, dan penyakit yang menyerang tanaman yang
            menghasilkan (Kementerian Pertanian Republik Indonesia, 2022). Penyakit pada tanaman kelapa yang sering dijumpai di antaranya adalah penyakit busuk
            pucuk dan penyakit bercak daun. Penyakit-penyakit tersebut dapat mempengaruhi pertumbuhan dan
            produktivitas tanaman kelapa, yang beresiko mengakibatkan turunnya angka produksi dan, pada gilirannya,
            kesejahteraan petani.</p>
        <p style="text-align: justify">Untuk mengatasi persoalan tersebut dan meningkatkan angka produksi tanaman
            kelapa yang menjadi salah satu komoditas utama di berbagai daerah di Indonesia, faktor-faktor penghambat
            tersebut harus dikendalikan. Petani sejauh ini telah menerapkan berbagai prosedur penanganan sederhana
            seperti memberikan fungisida, namun mengingat banyaknya jumlah faktor-faktor eksternal yang dapat
            mengganggu pertumbuhan dan produktivitas kelapa tersebut, sulit untuk menentukan jenis penyakit dan
            penanganan yang harus dilakukan.</p>
        <p style="text-align: justify">Sistem pakar dapat digunakan untuk mengatasi hal tersebut. Sistem pakar
            adalah salah satu cabang artificial intelligence yang membuat penggunaan secara luas knowledge yang
            khusus untuk penyelesaian masalah tingkat manusia yang pakar. Seorang pakar adalah orang yang mempunyai
            keahlian dalam bidang tertentu, yaitu seseorang yang mempunyai knowledge atau kemampuan khusus yang
            orang lain tidak mengetahui atau mampu dalam bidang yang dimilikinya (Arhami, 2005).</p>
    </article>
@endsection
