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
                  <tr>
                    <td>1</td>
                    <td>Muhammad Faza</td>
                    <td>Staf Fungsi IPDS</td>
                    <td>III/A</td>
                    <td>PNS</td>
                    <td>01/04/2021</td>
                    <td>
                      <div>
                        <a href="#" class="btn btn-primary" role="button">Ubah</a>
                        <a href="#" class="btn btn-danger" role="button">Hapus</a>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Abdul Haris Rizaldy
                    </td>
                    <td>Staf Fungsi Distribusi</td>
                    <td>III/A</td>
                    <td>PNS</td>
                    <td>01/04/2021</td>
                    <td>
                      <div>
                        <a href="#" class="btn btn-primary" role="button">Ubah</a>
                        <a href="#" class="btn btn-danger" role="button">Hapus</a>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Rakai Al Baihaqi
                    </td>
                    <td>Staf Fungsi Sosial</td>
                    <td>III/A</td>
                    <td>CPNS</td>
                    <td>01/12/2021</td>
                    <td>
                      <div>
                        <a href="#" class="btn btn-primary" role="button">Ubah</a>
                        <a href="#" class="btn btn-danger" role="button">Hapus</a>
                      </div>
                    </td>
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