<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <base href="/public">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Pannel</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="admin/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="admin/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="admin/assets/images/favicon.png" />
     
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
            <h3>Klassy Cafe</h3>
          
        </div>
        <ul class="nav">
          <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="/admindashboard">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="{{route('admin.orderlists')}}">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
              <span class="menu-title">Order Lists</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="{{route('admin.userlists')}}">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
              <span class="menu-title">User Lists</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="{{route('admin.foodlists')}}">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
              <span class="menu-title">Food Lists</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="{{route('admin.cheflists')}}">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
              <span class="menu-title">Chef Lists</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="{{route('admin.reservationlists')}}">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
              <span class="menu-title">Reservation Lists</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="{{route("admin.foodadd")}}">
              <span class="menu-icon">
                <i class="mdi mdi-table-large"></i>
              </span>
              <span class="menu-title">Add Food</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="{{route("admin.chefsadd")}}">
              <span class="menu-icon">
                <i class="mdi mdi-chart-bar"></i>
              </span>
              <span class="menu-title">Add Chefs</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        
        <nav class="navbar p-0 fixed-top d-flex flex-row">
          <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
          </div>
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item dropdown">
                    <x-app-layout></x-app-layout>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-format-line-spacing"></span>
            </button>
          </div>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="my-3">
            
             <x-alert />
            
             @yield('content')
             {{-- message={{Session::get("success") || Session::get("error")}} --}}
          </div>
           
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>

    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="admin/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="admin/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="admin/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="admin/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="admin/assets/js/off-canvas.js"></script>
    <script src="admin/assets/js/hoverable-collapse.js"></script>
    <script src="admin/assets/js/misc.js"></script>
    <script src="admin/assets/js/settings.js"></script>
    <script src="admin/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="admin/assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>