@extends("layouts.layout")
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Input Data Pegawai</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active"><a href="{{ route('pegawai.index') }}">Kelola Pegawai</a></li>
              <li class="breadcrumb-item active">Input Data Pegawai</li>
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
                <a href="{{route('pegawai.index')}}" class="btn btn-sm btn-secondary" role="button"><i class="fas fa-arrow-left"></i>&nbsp; Kembali</a>
                <form>
                  <div class="card-body">
                    <div class="form-group">
                      <label for="nip">NIP</label>
                      <input name="nip" type="number" minlength="18" min="99999999999999999" max="999999999999999999" class="form-control @error('nip') is-invalid @enderror" id="nip" placeholder="Masukkan NIP Pegawai..." required autofocus>
                      @error('nip')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="nama">Nama</label>
                      <input name="nama" type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukkan Nama Pegawai..." required>
                      @error('nama')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="jabatan">Jabatan</label>
                      <input name="jabatan" type="text" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" placeholder="Jabatan..." required>
                      @error('jabatan')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label>Golongan</label>
                      <select class="custom-select" required>
                        <option>Pilih Kelas Golongan...</option>
                        @foreach ($golongans as $g)
                          <option value="{{$g->id}}">{{$g->nama_golongan}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Status</label>
                      <div class="custom-control custom-radio">
                        <input id="CPNS" class="custom-control-input" type="radio" name="status" value="CPNS" required>
                        <label for="CPNS" class="custom-control-label">CPNS</label>
                      </div>
                      <div class="custom-control custom-radio">
                        <input id="PNS" class="custom-control-input" type="radio" name="status" value="PNS" required>
                        <label for="PNS" class="custom-control-label">PNS</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>TMT CPNS:</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <input name="tmt_cpns" id="datemask" type="text" class="form-control @error('tmt_cpns') is-invalid @enderror" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask required>
                        @error('tmt_cpns')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>
                      <!-- /.input group -->
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Masukkan Alamat Email..." required>
                      @error('email')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input name="password" type="password" class="form-control" id="password" placeholder="Masukkan Password" required>
                    </div>
                    <div class="form-group">
                      <label>Peran</label>
                      <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="admin" name="role">
                        <label for="admin" class="custom-control-label">Admin</label>
                      </div>
                      <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="user" name="role" checked>
                        <label for="user" class="custom-control-label">Pengguna</label>
                      </div>
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-right">Simpan</button>
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
@endsection
@section('js_script')
<script src="{{asset("js/moment.min.js")}}"></script>
<script src="{{asset("js/jquery.inputmask.bundle.min.js")}}"></script>
  <script>
    $(function () {
      //Datemask dd/mm/yyyy
      $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    })
  </script>
@endsection