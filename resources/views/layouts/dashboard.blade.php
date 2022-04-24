<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

  
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="Importadora y Exportadora: El Gran Camarón, nos especializamos
    en traer los productos más importantes del sector....">

    <meta name="keywords" content="Importadora y Exportadora, Importadora, Exportadora, importadora y exportadora, el gran camaron, camaron, importadora el gran camaron, importadora y exportadora el gran camaron, etc...">

    <meta name="author" content="[Dev] Zisko" />

    <meta name="copyright" content="Importadora y Exportadora: El Gran Camarón" />
  
  <title>Importadora y Exportadora | El Gran Camarón</title>
  <link rel="icon" href="images/favicon.ico" type="image/x-icon">
  <!-- Custom fonts for this template-->
  <link href="{{ url('dashboardAssets/vendor2/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ url('dashboardAssets/css/sb-admin-2.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('dashboardAssets/css/style.css') }}">

</head>
@if(1 == 1)
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul style="background-color: #262626 !important;" class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion color-subheader" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon">
            <img style="margin-left: 15px; width: 40%; height: 40%;" src="{{ url('images/icon.png') }}">
        </div>
        <div class="sidebar-brand-text mx-3"></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Heading -->
      <div style="color: white; text-align: center; margin-top: 3px;" class="sidebar-heading">
        Options:
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('ver-usuarios') }}">
          <i class="fas fa-fw fa-user-circle"></i>
          <span>Administrar Usuarios</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('ver-categorias') }}">
          <i class="fas fa-fw fa-bars"></i>
          <span>Administrar Categorías</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('ver-productos') }}">
          <i class="fas fa-fw fa-box"></i>
          <span>Administrar Productos</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('ver-cotizaciones') }}">
          <i class="fas fa-fw fa-file-invoice"></i>
          <span>Administrar Cotizaciones</span>
        </a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow color-header">

          <!-- Sidebar Toggle (Topbar) -->
          <button style="background: #E0E0E0;" id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i style="color: #212121;" class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span style="background: #FF0000;" class="badge badge-danger badge-counter">{{ $alert }}+</span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Cotizaciones
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">Importante</div>
                    @if($alert == 0)
                      <span class="font-weight-bold">No hay cotizaciones por revisar
                      </span>
                    @elseif($alert == 1)
                      <span class="font-weight-bold">Tienes {{ $alert }} cotización por revisar
                      </span>
                    @else
                      <span class="font-weight-bold">Tienes {{ $alert }} cotizaciones por revisar
                      </span>
                    @endif
                    
                  </div>
                </a>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span style="color: white !important;" class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                <img class="img-profile rounded-circle" src="../images/person_3.jpg">
              </a>
              <!-- Dropdown - User Information -->
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>Salir</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">

            @yield('head-content')
            
          </div>

          @yield('content')
    
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; El Gran Camarón 2021</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  @yield('scripts')
  <!-- Bootstrap core JavaScript-->
  <script src="{{ url('dashboardAssets/vendor2/jquery/jquery.min.js') }}"></script>
  <script src="{{ url('dashboardAssets/vendor2/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ url('dashboardAssets/vendor2/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ url('dashboardAssets/js/sb-admin-2.min.js') }}"></script>

  <!-- Page level plugins -->
  <script src="{{ url('dashboardAssets/vendor2/chart.js/Chart.min.js') }}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ url('dashboardAssets/js/demo/chart-area-demo.js') }}"></script>
  <script src="{{ url('dashboardAssets/js/demo/chart-pie-demo.js') }}"></script>

</body>
@else
  <h1 style="color: black;">Error 404. Page Not Found.</h1>
@endif

</html>
