<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('titre')</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('backend/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/css/vendor.bundle.base.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/css/vendor.bundle.addons.css') }}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('backend/images/logo_2H_tech.png') }}" />
</head>
<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
          {{-- Barre de navigation en haut start   --}}
            @include('include.navbar1')
          {{-- Barre de navigation en haut end   --}}
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
          {{-- Barre de navigation latérale gauche start   --}}
            @include('include.navbar2')
          {{-- Barre de navigation latérale gauche end   --}}
            {{--  Start content  --}}
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('AdminContent')
                    {{--  End content  --}}
                </div>
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                      <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018 <a href="https://www.urbanui.com/" target="_blank">Urbanui</a>. All rights reserved.</span>
                      <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
                    </div>
                </footer>
            </div>


        </div>
          <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{ asset('backend/js/vendor.bundle.base.js') }}"></script>
  <script src="{{ asset('backend/js/vendor.bundle.addons.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{ asset('backend/js/off-canvas.js') }}"></script>
  <script src="{{ asset('backend/js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('backend/js/template.js') }}"></script>
  <script src="{{ asset('backend/js/settings.js') }}"></script>
  <script src="{{ asset('backend/js/todolist.js') }}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  @yield('scripts')
  <!-- End custom js for this page-->
</body>

</html>