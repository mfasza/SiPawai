@extends("layouts.layout")
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Input KGB</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active"><a href="{{ route('kgb.kelola') }}">KGB</a></li>
              <li class="breadcrumb-item active">Input KGB</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-body">
                <a href="{{route('kgb.kelola')}}" class="btn btn-sm btn-secondary" role="button"><i class="fas fa-arrow-left"></i>&nbsp; Kembali</a>
                <form action="{{route('kgb.store', ['nip' => $pegawai->nip])}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method("post")
                  <div class="card-body">
                    <div class="form-group">
                      <label for="nomor_surat">Nomor Surat</label>
                      <input name="nomor_surat" type="text" class="form-control @error('nomor_surat') is-invalid @enderror" id="nomor_surat" placeholder="Masukkan Nomor Surat..." value="{{old('nomor_surat')}}" autofocus required>
                      @error('nomor_surat')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label>Tanggal KGB</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <input name="tgl_kgb" type="text" class="datemask form-control @error('tgl_kgb') is-invalid @enderror" value="{{old('tgl_kgb')}}" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask placeholder="Masukkan Tanggal KGB" required>
                        @error('tgl_kgb')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>
                      <!-- /.input group -->
                    </div>
                    <div class="form-group">
                      <label>Pimpinan</label>
                      <select name="pimpinan" class="custom-select @error('pimpinan') is-invalid @enderror" required>
                        <option value="0">Pilih Pimpinan BPS Kabupaten Mappi...</option>
                        @foreach ($pegawais as $p)
                          <option value="{{$p->nip}}" @if (old('pimpinan') == $p->nip) selected @endif>{{$p->nama}}</option>
                        @endforeach
                    </select>
                    @error('pimpinan')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                    </div>
                    <div class="form-group">
                      <label>Tanggal SK Terakhir</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <input name="tgl_sk_terakhir" type="text" class="form-control datemask @error('tgl_sk_terakhir') is-invalid @enderror" value="{{old('tgl_sk_terakhir')}}" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask placeholder="Masukkan Tanggal SK Terakhir" required>
                        @error('tgl_sk_terakhir')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>
                      <!-- /.input group -->
                    </div>
                    <div class="form-group">
                      <label for="nomor_surat_sk">Nomor Surat SK Terakhir</label>
                      <input name="nomor_surat_sk" type="text" class="form-control @error('nomor_surat_sk') is-invalid @enderror" id="nomor_surat_sk" placeholder="Masukkan Nomor Surat SK Terakhir" value="{{old('nomor_surat_sk')}}" required>
                      @error('nomor_surat_sk')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label>Tanggal Berlaku SK Terakhir</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <input name="tgl_berlaku_sk" type="text" class="form-control datemask @error('tgl_berlaku_sk') is-invalid @enderror" value="{{old('tgl_berlaku_sk')}}" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask placeholder="Masukkan Tanggal Berlaku SK Terakhir" required>
                        @error('tgl_berlaku_sk')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>
                      <!-- /.input group -->
                    </div>
                    <label for="tahun_sk">Masa Kerja Golongan SK Terakhir</label>
                    <div class="row">
                      <div class="col-6">
                        <div class="form-group">
                          <label for="tahun_sk">Tahun</label>
                          <input name="tahun_sk" type="number" class="form-control @error('tahun_sk') is-invalid @enderror" id="tahun_sk" placeholder="Masukkan Tahun Masa Kerja Gol SK Terakhir" value="{{old('tahun_sk')}}" required>
                          @error('tahun_sk')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <label for="bulan_sk">Bulan</label>
                          <input name="bulan_sk" type="number" class="form-control @error('bulan_sk') is-invalid @enderror" id="bulan_sk" placeholder="Masukkan Bulan Masa Kerja Gol SK Terakhir" value="{{old('bulan_sk')}}" required>
                          @error('bulan_sk')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                      </div>
                    </div>
                    @if ($pegawai->gajis->gaji == 0)
                      <div class="form-group">
                        <label for="gaji_lama">Gaji Lama</label>
                        <input name="gaji_lama" type="number" class="form-control @error('gaji_lama') is-invalid @enderror" id="gaji_lama" placeholder="Masukkan Gaji Sebelumnya..." value="{{old('gaji_lama')}}" required>
                        @error('gaji_lama')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>
                    @else
                      <div class="form-group">
                        <label for="gaji_lama">Gaji Lama</label>
                        <input name="gaji_lama" type="number" class="form-control @error('gaji_lama') is-invalid @enderror" id="gaji_lama" placeholder="Masukkan Gaji Sebelumnya..." value="{{$pegawai->gajis->gaji}}" readonly>
                        @error('gaji_lama')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                        <a id="edit_gaji_lama" class="small" href="#" role="button">Klik untuk merubah nilai gaji lama</a>
                      </div>
                    @endif
                    <div class="form-group">
                      <label for="gaji_lama_text">Gaji Lama Dalam Teks</label>
                      <input name="gaji_lama_text" type="text" class="form-control @error('gaji_lama_text') is-invalid @enderror" id="gaji_lama_text" placeholder="Dua Juta Empat Ratus Empat Puluh Sembilan Ribu Seratus" value="{{old('gaji_lama_text')}}" required>
                      @error('gaji_lama_text')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="gaji_baru">Gaji Baru</label>
                      <input name="gaji_baru" type="number" class="form-control @error('gaji_baru') is-invalid @enderror" id="gaji_baru" placeholder="Masukkan Gaji Sebelumnya..." value="{{old('gaji_baru')}}" required>
                      @error('gaji_baru')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="gaji_baru_text">Gaji Baru Dalam Teks</label>
                      <input name="gaji_baru_text" type="text" class="form-control @error('gaji_baru_text') is-invalid @enderror" id="gaji_baru_text" placeholder="Dua Juta Empat Ratus Empat Puluh Sembilan Ribu Seratus" value="{{old('gaji_baru_text')}}" required>
                      @error('gaji_baru_text')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <label for="tahun">Masa Kerja Pegawai</label>
                    <div class="row">
                      <div class="col-6">
                        <div class="form-group">
                          <label for="tahun">Tahun</label>
                          <input name="tahun" type="number" class="form-control @error('tahun') is-invalid @enderror" id="tahun" placeholder="Masukkan Tahun Masa Kerja Gol SK Terakhir" value="{{old('tahun')}}" required>
                          @error('tahun')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <label for="bulan">Bulan</label>
                          <input name="bulan" type="number" class="form-control @error('bulan') is-invalid @enderror" id="bulan" placeholder="Masukkan Bulan Masa Kerja Gol SK Terakhir" value="{{old('bulan')}}" required>
                          @error('bulan')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer text-right">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <button type="submit" class="btn btn-primary" formaction="{{route('kgb.generate', ['nip' => $pegawai->nip])}}" formtarget="_blank">Generate PDF</button>
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
@section('js_script')
<script src="{{asset("js/moment.min.js")}}"></script>
<script src="{{asset("js/jquery.inputmask.bundle.min.js")}}"></script>
<script src="{{asset("js/bs-custom-file-input.min.js")}}"></script>
  <script>
    $(function () {
      //Datemask dd/mm/yyyy
      $('.datemask').inputmask('yyyy/mm/dd', { 'placeholder': 'yyyy/mm/dd' })
    })
    $(document).ready(function () {
      bsCustomFileInput.init();
    });
    $(document).ready(function () {
      $('#edit_gaji_lama').on('click', function (event) {
        event.preventDefault();
        $('#gaji_lama').removeAttr('readonly');
      })
    })
  </script>
@endsection