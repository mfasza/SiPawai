@extends("layouts.layout")
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Kenaikan Gaji Berkala - {{$pegawai->nama}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">KGB</li>
              <li class="breadcrumb-item active">Kelola</li>
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
                <a href="{{route('kgb.kelola')}}" class="btn btn-sm btn-secondary mb-4" role="button"><i class="fas fa-arrow-left"></i>&nbsp; Kembali</a>
                <a href="{{route('kgb.create', $pegawai)}}" class="btn btn-sm btn-primary mb-4" role="button">Buat &nbsp;<i class="fas fa-plus"></i></a>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nomor Surat</th>
                    <th>Tanggal KGB</th>
                    <th>File</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($doc_kgbs as $i => $d)
                      <tr>
                        <td>{{$i+1}}</td>
                        <td>{{$d->no_surat}}</td>
                        <td>{{$d->tgl_kgb}}</td>
                        @if ($d->file_loc)
                          <td><a href="{{asset($d->file_loc)}}" target="_blank">{{$d->file_loc}}</a></td>
                        @else
                          <td>Dokumen Belum Diunggah</td>
                        @endif
                        <td>
                          @if (!$d->file_loc)
                            <a href="#" class="btn btn-success"  data-toggle="modal" data-target="#modal_unggah" data-backdrop="static" data-id="{{$d->id}}" role="button">Upload</a>
                          @endif
                          <a href="#" class="btn btn-danger"  data-toggle="modal" data-target="#modal_hapus" data-id="{{$d->id}}" role="button">Hapus KGB</a>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
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

  {{-- Modal Upload --}}
  <div class="modal fade" id="modal_unggah">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Unggah Surat KGB</h4></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Pilih File KGB yang akan diunggah</p>
          <form id="form_unggah_kgb" action="{{route('kgb.upload')}}" method="post" enctype="multipart/form-data">
            @method("post")
            @csrf
            <div class="form-group">
              <label for="doc_kgb">Pilih File</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input @error('doc_kgb') is-invalid @enderror" id="doc_kgb" name="doc_kgb" accept=".pdf" value="{{old('doc_kgb')}}" required>
                  @error('doc_kgb')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  <label class="custom-file-label" for="foto">Pilih file</label>
                </div>
              </div>
            </div>
            <input id="id_doc_unggah" type="hidden" name="id_doc">
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
          <button type="submit" class="btn btn-success">Upload</button>
        </div>
          </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

  {{-- Modal Hapus --}}
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
          <form id="form_hapus" action="{{route('kgb.destroy')}}" method="post">
            @method("delete")
            @csrf
            <input id="id_doc_hapus" type="hidden" name="id_doc">
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
  <script src="{{asset("js/bs-custom-file-input.min.js")}}"></script>
  <script>
    $('#modal_unggah').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var id_doc = button.data('id') // Extract info from data-* attributes
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this)
      modal.find('#id_doc_unggah').val(id_doc);
    })
    $('#modal_hapus').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var id_doc = button.data('id') // Extract info from data-* attributes
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this)
      modal.find('#id_doc_hapus').val(id_doc);
    })
    $(document).ready(function () {
      bsCustomFileInput.init();
    });
  </script>
@endsection