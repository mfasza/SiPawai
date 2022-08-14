<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Preview SPMT</title>
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="{{ asset('fonts/fonts.css') }}" rel="stylesheet">

    <style>
        hr.class-2 {
            border-top: 4px double;
        }
    </style>

</head>
<body>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <table>
                    <tr>
                        <td style="width: 1%">
                            <img src="{{asset('img/logo_bps.png')}}" alt="logo bps">
                        </td>
                        <td>
                            <h3 class="mb-0"><strong>BADAN PUSAT STATISTIK</strong></h3>
                            <h4 class="mb-0"><strong>KABUPATEN MAPPI</strong></h4>
                            <p class="mb-0"><strong>JL. POROS AGHAM KM. 5 KEPI - MAPPI</strong></p>
                        </td>
                        <td style="width: 5%">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <hr class="class-2">
                        </td>
                    </tr>
                </table>
                <table style="width: 100%;">
                    <tr>
                        <td colspan="3">
                            <div class="d-flex justify-content-center">
                                <p class="mb-0 text-center border-bottom border-dark">Surat Pernyataan Melaksanakan Tugas</p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <div class="d-flex justify-content-center">
                                <p class="mb-0">Nomor: {{$nomor_surat}}</p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <br>
                        </td>
                    </tr>
                </table>
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
                            <p class="m-0">Pembina, ({{$pimpinan->golongans->nama_golongan}})</p>
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
                <br>
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
                            <p class="m-0">Pembina, ({{$pegawai->golongans->nama_golongan}})</p>
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
                <p class="text-justify">
                    Berdasarkan Surat Keputusan Kepala Badan Pusat Statistik <strong>Nomor : {{$sk_pusat}} TAHUN {{$thn_sk_pusat}} tanggal {{$tgl_sk_pusat}}</strong>  telah nyata melaksanakan tugas sebagai staf BPS Kabupaten Mappi terhitung mulai tanggal  <strong>{{$tgl_spmt}}</strong>.
                </p>
                <p class="text-justify">
                    Demikian Surat Pernyataan Melaksanakan Tugas ini saya buat dengan sesungguhnya, dengan mengingat janji jabatan dan apabila di kemudian hari isi surat pernyataan ini ternyata tidak benar yang mengakibatkan kerugian terhadap Negara, maka saya bersedia  menanggung kerugian tersebut.
                </p>
                <p class="text-justify">
                    Asli Surat Pernyataan Melaksanakan Tugas ini disampaikan kepada Kepala Kantor Pelayanan Perbendaharaan Negara  Merauke
                </p>
                <br>
                <div style="width: 30%" class="text-center ml-auto">
                    <p class="m-0">Kepi, {{$today}}</p>
                    <p class="m-0">Kepala Badan Pusat Statistik</p>
                    <p class="m-0">Kabupaten Mappi</p>
                    <br><br><br><br>
                    <p class="m-0 border-bottom border-dark">{{$pimpinan->nama}}</p>
                    <p class="m-0">NIP.&nbsp;{{$pimpinan->nip}}</p>
                </div>
                <br><br>
                <p class="m-0">Tembusan disampaikan kepada:</p>
                <table>
                    <tr>
                        <td>
                            <p class="m-0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.</p>
                        </td>
                        <td>
                            <p class="m-0">Kepala Badan Pusat Statistik di Jakarta</p></pre>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="m-0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.</p>
                        </td>
                        <td>
                            <p class="m-0">Kepala Badan Kepegawaian Negara up. Deputi Bidang Informasi Kepegawaian di Jakarta</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="m-0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.</p>
                        </td>
                        <td>
                            <p class="m-0">Kepala BPS Provinsi Papua di Jayapura</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="m-0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4.</p>
                        </td>
                        <td>
                            <p class="m-0">Kepala Kantor Regional XI Badan Kepegawaian Negara di Jayapura</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="m-0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5.</p>
                        </td>
                        <td>
                            <p class="m-0">Pejabat Pembuat Daftar Gaji</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="m-0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;6.</p>
                        </td>
                        <td>
                            <p class="m-0">Pegawai Negeri Sipil yang bersangkutan</p>
                        </td>
                    </tr>
                </table>
                <br>
                <table style="width: 100%" class="text-center">
                    <tr>
                        <td>
                            <p class="m-0">Jl. Poros Agham, Km. 5 Kepi - Mappi</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="m-0">Homepage : http://www.mappikab.bps.go.id,    Email : bps9414@bps.go.id</p>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>