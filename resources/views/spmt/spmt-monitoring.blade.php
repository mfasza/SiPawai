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
                  <tr>
                    <td>1</td>
                    <td>Muhammad Faza
                    </td>
                    <td>12/12/2021</td>
                    <td>Sudah Dibuat</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Rakai Al Baihaqi
                    </td>
                    <td>12/12/2021</td>
                    <td>Sudah Dibuat</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Oky Dewiyanti
                    </td>
                    <td>12/12/2021</td>
                    <td>Sudah Dibuat</td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>O.S.A.N Jani Ode Tanda</td>
                    <td></td>
                    <td>Belum Dibuat</td>
                  </tr>
                  <tr>
                    <td>5</td>
                    <td>Bintang Laras Teo Pamungkas</td>
                    <td>12/12/2021</td>
                    <td>Sudah Dibuat</td>
                  </tr>
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