<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('template/')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('template/')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset('template/')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{ asset('template/') }}/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('template/')}}/dist/css/adminlte.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('template/')}}/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="{{asset('template/')}}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('template/')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
      <form action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit" class="btn btn-primary">log out</button>
      </form>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>

    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ asset('template/') }}/index3.html" class="brand-link">
      <img src="{{ asset('template/') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Manajemen SKP</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('template/') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ session('pengguna') }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-header"> Menu Manajemen Data SKP</li>
            <li class="nav-item">
                <a href="/department" class="nav-link">
                    <i class="fas fa-list"></i>
                    <p>
                        Data SKP
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/jobdescription" class="nav-link">
                            <i class="nav-icon far fa-circle text-info"></i>
                            <p>
                                Data Seluruh SKP
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/subdepartment" class="nav-link">
                            <i class="nav-icon far fa-circle text-info"></i>
                            <p>
                                Manajemen Sub-Bidang
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/employment" class="nav-link">
                            <i class="nav-icon far fa-circle text-info"></i>
                            <p>Manajemen Jabatan</p>
                        </a>
                    </li>
                </ul>
            </li>


          <li class="nav-header">Menu Manajemen Data Bidang</li>

          <li class="nav-item">
            <a href="/department" class="nav-link">
                <i class="fas fa-list"></i>
                <p>
                    Data Bidang
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/department" class="nav-link">
                    <i class="nav-icon far fa-circle text-info"></i>
                    <p>
                        Manajemen Bidang
                    </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/subdepartment" class="nav-link">
                    <i class="nav-icon far fa-circle text-info"></i>
                    <p>
                        Manajemen Sub-Bidang
                    </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/employment" class="nav-link">
                    <i class="nav-icon far fa-circle text-info"></i>
                    <p>Manajemen Jabatan</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-header">Menu Manajemen Data Akun</li>
            <li class="nav-item">
                <a href="/department" class="nav-link">
                    <i class="fas fa-list"></i>
                    <p>
                        Data Akun
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/department" class="nav-link">
                            <i class="nav-icon far fa-circle text-info"></i>
                            <p>
                                Manajemen Bidang
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/subdepartment" class="nav-link">
                            <i class="nav-icon far fa-circle text-info"></i>
                            <p>
                                Manajemen Sub-Bidang
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/employment" class="nav-link">
                            <i class="nav-icon far fa-circle text-info"></i>
                            <p>Manajemen Jabatan</p>
                        </a>
                    </li>
                </ul>
            </li>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            @yield('pageName')
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              @yield('breadCrumb')
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        @yield('container')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0-rc
    </div>
    <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('template/') }}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('template/') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('template/') }}/dist/js/adminlte.min.js"></script>
<!-- SweetAlert2 -->
<script src="{{ asset('template/') }}/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Select2 -->
<script src="{{ asset('template/') }}/plugins/select2/js/select2.full.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('template/') }}/dist/js/demo.js"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('template/') }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('template/') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('template/') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('template/') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<!-- <script type="text/javascript" src="{{ asset('dataTables/') }}/datatables.min.js"></script> -->
<script>
    $(document).ready(function() {
        // $('#tabelskp').DataTable();
        $('.select2').select2();
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        });
        $("#tabelskp").DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "language": {
                "search": "Cari:"
            },
            "oLanguage": {
                "sZeroRecords": "Tidak ada data",
                "sEmptyTable": "Tidak ada data",
                "sInfo": "Menampilkan total _TOTAL_ data (_START_ s/d _END_)",
                "sInfoFiltered": " - disaring dari _MAX_ data",
                "sInfoEmpty": "Tidak ada data"


            }
        });
    } );


</script>
</body>
</html>
