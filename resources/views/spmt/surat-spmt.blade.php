<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SPMT | {{$pegawai->nama}}</title>
    
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
    </style>

</head>
<body>
    {{-- <div class="container-fluid">
        <div class="card">
            <div class="card-body"> --}}
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
                <p class="mb-0 text-center"><u>SURAT PERNYATAAN MELAKSANAKAN TUGAS</u></p>
                <p class="mb-0 text-center">Nomor: {{$nomor_surat}}</p>
                <br>
                <p class="m-0">Yang bertanda tangan di bawah ini:</p>
                <table>
                    <tr>
                        <td>
                            <p class="m-0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama</p>
                        </td>
                        <td>
                            <p class="m-0">:</p>
                        </td>
                        <td>
                            <p class="m-0">{{$pimpinan->nama}}</p></pre>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="m-0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NIP</p>
                        </td>
                        <td>
                            <p class="m-0">:</p>
                        </td>
                        <td>
                            <p class="m-0">{{$pimpinan->nip}}</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="m-0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pangkat / Golongan</p>
                        </td>
                        <td>
                            <p class="m-0">:</p>
                        </td>
                        <td>
                            <p class="m-0">{{$pimpinan->golongans->pangkat_golongan}}, ({{$pimpinan->golongans->nama_golongan}})</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="m-0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Jabatan</p>
                        </td>
                        <td>
                            <p class="m-0">:</p>
                        </td>
                        <td>
                            <p class="m-0">{{$pimpinan->jabatan}}</p>
                        </td>
                    </tr>
                </table>
                <p class="m-0">Dengan ini menyatakan dengan sesungguhnya bahwa:</p>
                <table>
                    <tr>
                        <td>
                            <p class="m-0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama</p>
                        </td>
                        <td>
                            <p class="m-0">:</p>
                        </td>
                        <td>
                            <p class="m-0">{{$pegawai->nama}}</p></pre>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="m-0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NIP</p>
                        </td>
                        <td>
                            <p class="m-0">:</p>
                        </td>
                        <td>
                            <p class="m-0">{{$pegawai->nip}}</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="m-0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pangkat / Golongan</p>
                        </td>
                        <td>
                            <p class="m-0">:</p>
                        </td>
                        <td>
                            <p class="m-0">{{$pegawai->golongans->pangkat_golongan}}, ({{$pegawai->golongans->nama_golongan}})</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="m-0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Jabatan</p>
                        </td>
                        <td>
                            <p class="m-0">:</p>
                        </td>
                        <td>
                            <p class="m-0">{{$pegawai->jabatan}}</p>
                        </td>
                    </tr>
                </table>
                <br>
                <p class="text-justify m-0">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Berdasarkan Surat Keputusan Kepala Badan Pusat Statistik <strong>Nomor : {{$sk_pusat}} TAHUN {{$thn_sk_pusat}} tanggal {{$tgl_sk_pusat}}</strong>  telah nyata melaksanakan tugas sebagai staf BPS Kabupaten Mappi terhitung mulai tanggal  <strong>{{$tgl_spmt}}</strong>.
                </p>
                <p class="text-justify m-0">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian Surat Pernyataan Melaksanakan Tugas ini saya buat dengan sesungguhnya, dengan mengingat janji jabatan dan apabila di kemudian hari isi surat pernyataan ini ternyata tidak benar yang mengakibatkan kerugian terhadap Negara, maka saya bersedia  menanggung kerugian tersebut.
                </p>
                <p class="text-justify m-0">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Asli Surat Pernyataan Melaksanakan Tugas ini disampaikan kepada Kepala Kantor Pelayanan Perbendaharaan Negara  Merauke
                </p>
                <br>
                <div style="width: 50%" class="text-center ml-auto">
                    <p class="m-0">Kepi, {{$today}}</p>
                    <p class="m-0">Kepala Badan Pusat Statistik</p>
                    <p class="m-0">Kabupaten Mappi</p>
                    <br><br><br>
                    <p class="m-0"><u>{{$pimpinan->nama}}</u></p>
                    <p class="m-0">NIP.&nbsp;{{$pimpinan->nip}}</p>
                </div>
                <br><br>
                <p style="font-size: 9pt" class="m-0">Tembusan disampaikan kepada:</p>
                <p style="font-size: 9pt" class="m-0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. Kepala Badan Pusat Statistik di Jakarta</p>
                <p style="font-size: 9pt" class="m-0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. Kepala Badan Kepegawaian Negara up. Deputi Bidang Informasi Kepegawaian di Jakarta</p>
                <p style="font-size: 9pt" class="m-0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3. Kepala BPS Provinsi Papua di Jayapura</p>
                <p style="font-size: 9pt" class="m-0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4. Kepala Kantor Regional XI Badan Kepegawaian Negara di Jayapura</p>
                <p style="font-size: 9pt" class="m-0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5. Pejabat Pembuat Daftar Gaji</p>
                <p style="font-size: 9pt" class="m-0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;6. Pegawai Negeri Sipil yang bersangkutan</p>
                <br><br>
                <p class="m-0 text-center" style="font-size: 9pt;">Jl. Poros Agham, Km. 5 Kepi - Mappi</p>
                <p class="m-0 text-center" style="font-size: 9pt;">Homepage : http://www.mappikab.bps.go.id,    Email : bps9414@bps.go.id</p>
            {{-- </div>
        </div>
    </div> --}}
    <!-- jQuery -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>