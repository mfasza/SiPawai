@extends("layouts.layout")
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Surat Pernyataan Melaksanakan Tugas</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">SPMT</li>
              <li class="breadcrumb-item active">Monitoring</li>
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
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Pegawai</th>
                    <th>Tanggal SPMT</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                    @if ($spmts)
                      @foreach ($spmts as $i => $k)
                        <tr>
                          <td>{{$i+1}}</td>
                          <td>{{$k->nama}}</td> 
                          <td>{{$k->tgl_spmt}}</td>
                          <td>
                            @if ($k->tgl_spmt !== '-')
                              <a class="text-success" href="{{route('spmt.show.user', ['nip'=> $k->nip])}}" target="_blank">{{$k->status}}</a>
                            @else
                              {{$k->status}}
                            @endif
                          </td>
                        </tr>
                      @endforeach
                    @endif
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