<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KGB | {{$pegawai->nama}}</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="{{ asset('fonts/fonts.css') }}" rel="stylesheet">

    <style>
        @page { margin-top: 12pt; margin-bottom: 12pt }
        table, p { font-size: 11pt }
        hr.class-2 {
            border-top: 2px double #000000;
        }
        td {vertical-align: top;}
    </style>
</head>
<body>
    <table style="width: 100%;">
        <tr>
            <td style="width: 1%">
                <img src="{{asset('img/logo_bps.png')}}" alt="logo bps">
            </td>
            <td>
                <h5 class="mb-0"><strong>BADAN PUSAT STATISTIK</strong></h5>
                <h6 class="mb-0"><strong>KABUPATEN MAPPI</strong></h6>
                <p class="mb-0"><strong>JL. POROS AGHAM KM. 5 KEPI - MAPPI</strong></p>
            </td>
            <td style="width: 5%">
            </td>
        </tr>
    </table>
    <hr class="class-2 m-0">
    <table style="width: 100%">
        <tr>
            <td>
                <p class="mb-0">Nomor</p>
            </td>
            <td>
                <p class="mb-0">:</p>
            </td>
            <td>
                <p class="mb-0">{{$nomor_surat}}</p>
            </td>
            <td>
                <p class="mb-0 text-right">Kepi, {{$today}}</p>
            </td>
        </tr>
        <tr>
            <td>
                <p class="mb-0">Lampiran</p>
            </td>
            <td>
                <p class="mb-0">:</p>
            </td>
            <td>
                <p class="mb-0">-</p>
            </td>
        </tr>
        <tr>
            <td>
                <p class="mb-0">Perihal</p>
            </td>
            <td>
                <p class="mb-0">:</p>
            </td>
            <td>
                <p class="mb-0">Kenaikan Gaji Berkala</p>
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>
                <p class="mb-0">a.n. <u>{{$pegawai->nama}}</u></p>
            </td>
        </tr>
    </table>
    <br>
    <p class="mb-0">Kepada Yang Terhormat:</p>
    <p class="mb-0">Kepala Kantor Pelayanan dan Perbendaharaan Negara Merauke</p>
    <p class="mb-0">Di Merauke</p>
    <br>
    <p class="mb-0">Dengan ini diberitahukan bahwa berhubung dengan telah dipenuhinya masa kerja dan syarat-syarat lainnya, maka kepada:</p>
    <table>
        <tr>
            <td>
                <p class="mb-0">1.</p>
            </td>
            <td>
                <p class="mb-0">Nama</p>
            </td>
            <td>
                <p class="mb-0">:</p>
            </td>
            <td>
                <p class="mb-0">{{$pegawai->nama}}</p>
            </td>
        </tr>
        <tr>
            <td>
                <p class="mb-0">2.</p>
            </td>
            <td>
                <p class="mb-0">NIP</p>
            </td>
            <td>
                <p class="mb-0">:</p>
            </td>
            <td>
                <p class="mb-0">{{$pegawai->nip}}</p>
            </td>
        </tr>
        <tr>
            <td>
                <p class="mb-0">3.</p>
            </td>
            <td>
                <p class="mb-0">Pangkat / Jabatan</p>
            </td>
            <td>
                <p class="mb-0">:</p>
            </td>
            <td>
                <p class="mb-0">{{$pegawai->golongans->pangkat_golongan}} ({{$pegawai->golongans->nama_golongan}}) / {{$pegawai->jabatan}}</p>
            </td>
        </tr>
        <tr>
            <td>
                <p class="mb-0">4.</p>
            </td>
            <td>
                <p class="mb-0">Kantor / Tempat</p>
            </td>
            <td>
                <p class="mb-0">:</p>
            </td>
            <td>
                <p class="mb-0">Badan Pusat Statistik Kabupaten Mappi</p>
            </td>
        </tr>
        <tr>
            <td>
                <p class="mb-0">5.</p>
            </td>
            <td>
                <p class="mb-0">Gaji Pokok Lama</p>
            </td>
            <td>
                <p class="mb-0">:</p>
            </td>
            <td>
                <p class="mb-0">Rp.{{$gaji_lama}},- ({{$gaji_lama_text}} Rupiah)</p>
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td colspan="3">
                <p class="mb-0">&nbsp;&nbsp;&nbsp;&nbsp;(atas dasar SKP terakhir tentang gaji / pangkat yang ditetapkan)</p>
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td>
                <p class="mb-0"></p>
            </td>
            <td>
                <p class="mb-0">&nbsp;&nbsp;&nbsp;&nbsp;a. Oleh Pejabat</p>
            </td>
            <td>
                <p class="mb-0">:</p>
            </td>
            <td>
                <p class="mb-0">Kepala Badan Pusat Statistik</p>
            </td>
        </tr>
        <tr>
            <td>
                <p class="mb-0"></p>
            </td>
            <td>
                <p class="mb-0">&nbsp;&nbsp;&nbsp;&nbsp;b. Tanggal</p>
            </td>
            <td>
                <p class="mb-0">:</p>
            </td>
            <td>
                <p class="mb-0">{{$tgl_sk_terakhir}}</p>
            </td>
        </tr>
        <tr>
            <td>
                <p class="mb-0"></p>
            </td>
            <td>
                <p class="mb-0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nomor</p>
            </td>
            <td>
                <p class="mb-0">:</p>
            </td>
            <td>
                <p class="mb-0">{{$nomor_surat_sk}}</p>
            </td>
        </tr>
        <tr>
            <td>
                <p class="mb-0"></p>
            </td>
            <td>
                <p class="mb-0">&nbsp;&nbsp;&nbsp;&nbsp;c. Tanggal Berlakunya</p>
            </td>
            <td>
                <p class="mb-0">:</p>
            </td>
            <td>
                <p class="mb-0">{{$tgl_berlaku_sk}}</p>
            </td>
        </tr>
        <tr>
            <td>
                <p class="mb-0"></p>
            </td>
            <td>
                <p class="mb-0">&nbsp;&nbsp;&nbsp;&nbsp;d. Masa Kerja Gol</p>
            </td>
            <td>
                <p class="mb-0">:</p>
            </td>
            <td>
                <p class="mb-0">{{$tahun_sk}} Tahun {{$bulan_sk}} Bulan</p>
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td>
                <p class="mb-0"></p>
            </td>
            <td colspan="3">
                <p class="mb-0">&nbsp;&nbsp;&nbsp;&nbsp;Diberikan Kenaikan Gaji Berkala hingga memperoleh :</p>
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td>
                <p class="mb-0">6.</p>
            </td>
            <td>
                <p class="mb-0">Gaji Pokok Baru</p>
            </td>
            <td>
                <p class="mb-0">:</p>
            </td>
            <td>
                <p class="mb-0">Rp.{{$gaji_baru}},- ({{$gaji_baru_text}} Rupiah)</p>
            </td>
        </tr>
        <tr>
            <td>
                <p class="mb-0">7.</p>
            </td>
            <td>
                <p class="mb-0">Dengan Masa Kerja</p>
            </td>
            <td>
                <p class="mb-0">:</p>
            </td>
            <td>
                <p class="mb-0">{{$tahun}} Tahun {{$bulan}} Bulan</p>
            </td>
        </tr>
        <tr>
            <td>
                <p class="mb-0">8.</p>
            </td>
            <td>
                <p class="mb-0">Gol / Ruang</p>
            </td>
            <td>
                <p class="mb-0">:</p>
            </td>
            <td>
                <p class="mb-0">{{$pegawai->golongans->nama_golongan}}</p>
            </td>
        </tr>
        <tr>
            <td>
                <p class="mb-0">9.</p>
            </td>
            <td>
                <p class="mb-0">Mulai Tanggal</p>
            </td>
            <td>
                <p class="mb-0">:</p>
            </td>
            <td>
                <p class="mb-0">{{$tgl_kgb}}</p>
            </td>
        </tr>
    </table>
    <p class="mb-0">Diharapkan agar sesuai dengan ayat 1 pasal 29 Keputusan Presiden Nomor 42 Tahun 2002 kepada pegawai tersebut dapat dibayarkan dengan penghasilannya berdasarkan gaji pokok yang baru</p>
    <br>
    <div style="width: 50%" class="text-center ml-auto">
        <p class="m-0">Kepala Badan Pusat Statistik</p>
        <p class="m-0">Kabupaten Mappi</p>
        <br><br><br>
        <p class="m-0"><u>{{$pimpinan->nama}}</u></p>
        <p class="m-0">NIP.&nbsp;{{$pimpinan->nip}}</p>
    </div>
    <br><br><br><br><br>
    <p style="font-size: 9pt" class="m-0">Tembusan disampaikan kepada:</p>
    <p style="font-size: 9pt" class="m-0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. Kepala Badan Kepegawaian Negara up. Deputi Bidang Informasi Kepegawaian di Jakarta</p>
    <p style="font-size: 9pt" class="m-0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. Kepala Badan Pusat Statistik di Jakarta</p>
    <p style="font-size: 9pt" class="m-0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3. Direktur PT. TASPEN (Persero) di Jakarta</p>
    <p style="font-size: 9pt" class="m-0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4. Deputi Tata Usaha Kepegawaian BKN di Jakarta</p>
    <p style="font-size: 9pt" class="m-0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5. Kepala Biro Personil Sekretariat Kabinet R.I di Jakarta</p>
    <p style="font-size: 9pt" class="m-0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;6. Kepala Kanwil XXX Ditjen Anggaran di Jayapura</p>
    <p style="font-size: 9pt" class="m-0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;7. Kepala Kantor Regional IX BKN di Jayapura</p>
    <p style="font-size: 9pt" class="m-0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;8. Kepala Kantor PT. TASPEN (Persero) di Jayapura</p>
    <p style="font-size: 9pt" class="m-0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;9. Kepala BPS Provinsi Papua di Jayapura</p>
    <p style="font-size: 9pt" class="m-0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;10. Pegawai Yang Bersangkutan</p>
    <p style="font-size: 9pt" class="m-0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;11. Pertinggal</p>

    <!-- jQuery -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>