@extends("layouts.layout")
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Kenaikan Gaji Berkala - Kelola</h1>
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
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Pegawai</th>
                    <th>Golongan</th>
                    <th>TMT</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($pegawai as $i => $p)
                    <tr>
                      <td>{{$i +1}}</td>
                      <td>{{$p->nama}}</td>
                      <td>{{$p->golongans->nama_golongan}}</td>
                      <td>{{$p->tmt_cpns}}</td>
                      <td>
                        <div>
                          <a href="{{route('kgb.create', $p->nip)}}" class="btn btn-primary" role="button">Buat</a>
                          @if ($p->kgbs->count() > 0)
                            <a href="{{route('kgb.show', $p->nip)}}" class="btn btn-warning" role="button">Lihat</a>
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
  @endsection