<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Адмін - @yield('title')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="/admin/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/admin/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="/admin/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="/admin/plugins/summernote/summernote-bs4.min.css">

  <link href="/admin/dist/css/colorbox.css" rel="stylesheet">
  <link href="/admin/dist/css/my.css" rel="stylesheet">

  <!-- Tiny -->
  <script src="https://cdn.tiny.cloud/1/yas7oiac23v0dhiwoqxt982o2qum4jczpahg98pw4n5jophj/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="/admin/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('homeAdmin') }}" class="brand-link">
      <img src="/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        {{-- <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div> --}}
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('homeAdmin') }}" class="nav-link">
                <i class="nav-icon fa fa-home"></i>
                <p>Головна</p>
            </a>
          </li>
          <li class="nav-item menu">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-folder-open"></i>
              <p>
                Каталог
              </p>
              <i class="fas fa-angle-left right"></i>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('artifact.index') }}" class="nav-link">
                  <p>Експонати</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('groups.index') }}" class="nav-link">
                  <p>Групи</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('departments.index') }}" class="nav-link">
                  <p>Відділи</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('collections.index') }}" class="nav-link">
                  <p>Колекції</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('files.index') }}" class="nav-link">
                <i class="nav-icon fa fa-file"></i>
                <p>Файли</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('news.index') }}" class="nav-link">
                <i class="nav-icon fa fa-newspaper"></i>
                <p>Новини</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('faculty.index') }}" class="nav-link">
                <i class="nav-icon fa fa-book"></i>
                <p>Факультети</p>
            </a>
          </li>
          <li class="nav-item">
            <a href=" {{ route('about.edit', ['about' => \App\Models\About::first()->id]) }} " class="nav-link">
                <i class="nav-icon fa fa-university"></i>
                <p>Про нас</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('users.index') }}" class="nav-link">
                <i class="nav-icon fa fa-users"></i>
                <p>Користувачі</p>
            </a>
          </li>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
            <!-- CSRF токен для захисту від атак CSRF -->
        </form>
        
        <li class="nav-item">
            <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="nav-icon fa fa-power-off"></i>
                <p>Вихід</p>
            </a>
        </li>
        
        </ul>
        
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="/admin/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="/admin/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="/admin/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap 
<script src="/admin/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>-->
<!-- jQuery Knob Chart -->
<script src="/admin/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/admin/plugins/moment/moment.min.js"></script>
<script src="/admin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="/admin/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/admin/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/admin/dist/js/pages/dashboard.js"></script>
<script src="/admin/admin.js"></script>
<script type="text/javascript" src="/admin/dist/js/jquery.colorbox-min.js"></script>
<script type="text/javascript" src="/packages/barryvdh/elfinder/js/standalonepopup.js"></script>

</body>
</html>
