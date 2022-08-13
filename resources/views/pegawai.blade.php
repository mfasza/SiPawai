@extends("layouts.layout")
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Kelola Data Pegawai</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Kelola Pegawai</li>
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
                <a href="{{route('pegawai.create')}}" class="btn btn-sm btn-success mb-4" role="button">Input Data Baru &nbsp;<i class="fas fa-plus"></i></a>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Pegawai</th>
                    <th>Jabatan</th>
                    <th>Golongan</th>
                    <th>Status</th>
                    <th>TMT CPNS</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($pegawais as $i => $p)
                    <tr>
                      <td>{{$i+1}}</td>
                      <td>{{$p->nama}}</td>
                      <td>{{$p->jabatan}}</td>
                      <td>{{$p->golongans->nama_golongan}}</td>
                      <td>{{$p->status}}</td>
                      <td>{{$p->tmt_cpns}}</td>
                      <td>
                        <div>
                          <a href="{{route('pegawai.edit', $p->nip)}}" class="btn btn-sm btn-primary" role="button">Ubah</a>
                          <a href="#" class="btn btn-sm btn-danger hapus" data-nip="{{$p->nip}}" data-nama="{{$p->nama}}" data-toggle="modal" data-target="#modal_hapus" role="button">Hapus</a>
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
  <script>
    var base_loc = window.location.href + '/';
    $('.hapus').on('click', function(event){
      var peg_nip = $(this).data('nip');
      var peg_nama = $(this).data('nama');
      $('#info').html(peg_nama);  
      $('#form_hapus').attr("action", base_loc+peg_nip);
    });
  </script>
@endsection