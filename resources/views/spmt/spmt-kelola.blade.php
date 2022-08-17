@extends("layouts.layout")
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Surat Pernyataan Melaksanakan Tugas - Kelola</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">SPMT</li>
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
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Pegawai</th>
                    <th>TMT</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($pegawai as $i => $p)
                      <tr>
                        <td>{{$i+1}}</td>
                        <td>{{$p->nama}}</td>
                        <td>{{$p->tmt_cpns}}</td>
                        <td>
                          <div>
                            @if ($p->spmts)
                              @if ($p->spmts->file_loc)
                                <a href="{{route('spmt.show', ['nip'=>$p->nip])}}" class="btn btn-warning" role="button" target="_blank">Lihat</a>
                                <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#modal_hapus" data-nip="{{$p->nip}}" role="button">Hapus SPMT</a>
                              @else
                                <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modal_unggah" data-backdrop="static" data-nip="{{$p->nip}}" role="button">Upload</a>
                              @endif
                            @else
                              <a href="{{route('spmt.create', $p->nip)}}" class="btn btn-primary" role="button">Buat</a>
                            @endif
                          </div>
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
          <h4 class="modal-title">Unggah Surat SPMT</h4></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Pilih File SPMT yang akan diunggah</p>
          <form id="form_unggah_spmt" action="{{route('spmt.upload')}}" method="post" enctype="multipart/form-data">
            @method("post")
            @csrf
            <div class="form-group">
              <label for="doc_spmt">Pilih File</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input @error('doc_spmt') is-invalid @enderror" id="doc_spmt" name="doc_spmt" accept=".pdf" value="{{old('doc_spmt')}}" required>
                  @error('doc_spmt')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  <label class="custom-file-label" for="foto">Pilih file</label>
                </div>
              </div>
            </div>
            <input id="nip_unggah" type="hidden" name="nip">
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
          <form id="form_hapus" action="{{route('spmt.destroy')}}" method="post">
            @method("delete")
            @csrf
            <input id="nip_hapus" type="hidden" name="nip">
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
      var nip = button.data('nip') // Extract info from data-* attributes
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this)
      modal.find('#nip_unggah').val(nip);
    })
    $('#modal_hapus').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var nip = button.data('nip') // Extract info from data-* attributes
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this)
      modal.find('#nip_hapus').val(nip);
    })
    $(document).ready(function () {
      bsCustomFileInput.init();
    });
  </script>
@endsection