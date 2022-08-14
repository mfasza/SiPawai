<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>SIPAWAI | BPS KABUPATEN MAPPI</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}">
   <!-- DataTables -->
   <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="{{ asset('fonts/fonts.css') }}" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item d-none d-sm-inline-block">
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
        <a class="nav-link" href="{{ route('logout') }}"
          onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
      <img src="{{ asset('/img/logo_bps.png') }}" alt="AdminLTE Logo" class="brand-image img-circle">
      <span class="brand-text font-weight-light">SIPAWAI MAPPI</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center">
        <div class="image">
          <img src="{{ asset($user->foto) }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info text-wrap">
          <a href="#" class="d-block">{{ $user->nama }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a id="home" href="{{ route('home') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Beranda
              </p>
            </a>
          </li>
          <li id="kgb-tree" class="nav-item has-treeview">
            <a id="kgb-link" href="#" class="nav-link">
              <i class="fas fa-chart-line"></i>
              <p>
                Surat KGB
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a id="kgb-monitoring" href="{{ route("kgb.monitoring") }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Monitoring</p>
                </a>
              </li>
              @if (Auth::user()->role == "admin")
                <li class="nav-item">
                  <a id="kgb-kelola" href="{{ route("kgb.kelola") }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Kelola</p>
                  </a>
                </li>
              @endif
            </ul>
          </li>
          <li id="spmt-tree" class="nav-item has-treeview">
            <a id="spmt-link" href="#" class="nav-link">
              <i class="fas fa-briefcase"></i>
              <p>
                Surat SPMT
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a id="spmt-monitoring" href="{{ route("spmt.monitoring") }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Monitoring</p>
                </a>
              </li>
              @if (Auth::user()->role == "admin")
                <li class="nav-item">
                  <a id="spmt-kelola" href="{{ route("spmt.kelola") }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Kelola</p>
                  </a>
                </li>
              @endif
            </ul>
          </li>
          @if (Auth::user()->role == "admin")
            <li class="nav-item">
              <a id="pegawai" href="{{ route('pegawai.index') }}" class="nav-link">
                <i class="fas fa-user"></i>
                <p>
                  Kelola Pegawai
                </p>
              </a>
            </li>
          @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  @yield("content")
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Made with &#10084;
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2022 <a href="https://mappikab.bps.go.id">BPS Kabupaten Mappi</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap4.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('js/adminlte.min.js') }}"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable({
      "lengthChange": true,
    });
  });
</script>
<script>
  $(document).ready(function() {
    let loc = window.location.pathname;
    if (loc == "/sipawai/public/") {
      $('#home').addClass("active");
    }
    if (loc == "/sipawai/public/kgb/monitoring") {
      $('#kgb-tree').addClass("menu-open");
      $('#kgb-link').addClass("active");
      $('#kgb-monitoring').addClass("active");
    }
    if (loc == "/sipawai/public/kgb/kelola" || window.location.href.indexOf("kgb") > -1) {
      $('#kgb-tree').addClass("menu-open");
      $('#kgb-link').addClass("active");
      $('#kgb-kelola').addClass("active");
    }
    if (loc == "/sipawai/public/spmt/monitoring") {
      $('#spmt-tree').addClass("menu-open");
      $('#spmt-link').addClass("active");
      $('#spmt-monitoring').addClass("active");
    }
    if (loc == "/sipawai/public/spmt/kelola" || window.location.href.indexOf("spmt") > -1) {
      $('#spmt-tree').addClass("menu-open");
      $('#spmt-link').addClass("active");
      $('#spmt-kelola').addClass("active");
    }
    if (window.location.href.indexOf("pegawai") > -1) {
      $('#pegawai').addClass("active");
    }
  });
</script>
@yield('js_script')
</body>
</html>
