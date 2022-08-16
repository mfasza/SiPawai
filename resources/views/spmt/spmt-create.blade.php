@extends("layouts.layout")
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Input SPMT</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active"><a href="{{ route('spmt.kelola') }}">SPMT</a></li>
              <li class="breadcrumb-item active">Input SPMT</li>
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
                <a href="{{route('spmt.kelola')}}" class="btn btn-sm btn-secondary" role="button"><i class="fas fa-arrow-left"></i>&nbsp; Kembali</a>
                <form action="{{route('spmt.store', ['nip' => $pegawai->nip])}}" method="POST" enctype="multipart/form-data">
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
                      <label>Tanggal SPMT</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <input name="tgl_spmt" type="text" class="form-control datemask @error('tgl_spmt') is-invalid @enderror" value="{{old('tgl_spmt')}}" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask placeholder="Masukkan Tanggal SPMT" required>
                        @error('tgl_spmt')
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
                    <label for="sk_pusat">Nomor SK BPS Pusat</label>
                    <input name="sk_pusat" type="text" class="form-control @error('sk_pusat') is-invalid @enderror" id="sk_pusat" placeholder="Masukkan Nomor SK Penempatan BPS Pusat..." value="{{old('sk_pusat')}}" required>
                    @error('sk_pusat')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label>Tanggal SK BPS Pusat</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                      </div>
                      <input name="tgl_sk_pusat" type="text" class="form-control datemask @error('tgl_sk_pusat') is-invalid @enderror" value="{{old('tgl_sk_pusat')}}" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask placeholder="Masukkan Tanggal SK Penempatan BPS Pusat..." required>
                      @error('tgl_sk_pusat')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <!-- /.input group -->
                  </div>
                  <div class="card-footer text-right">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <button type="submit" class="btn btn-primary" formaction="{{route('spmt.generate', ['nip' => $pegawai->nip])}}" formtarget="_blank">Generate PDF</button>
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

  <div class="modal fade" id="modal_hapus">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Hapus Data</h4></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
          <p>Apakah Anda yakin akan menghapus data <span id="info"></span>&quest;</p>
          <form id="form_hapus" action="{{url('pegawai/')}}" method="post">
            @method("delete")
            @csrf
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
          <button type="submit" class="btn btn-danger">Hapus</button>
        </div>
          </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
</div>
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
  </script>
@endsection