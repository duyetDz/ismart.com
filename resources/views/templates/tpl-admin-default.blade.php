<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Tables - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    
    <link href="{{ asset('') }}admin/css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet" />
    
</head>

<body class="sb-nav-fixed">
    <!-- Start Header -->
    @include('includes.header-admin')
    <!-- End Header -->

    <div id="layoutSidenav">
        <!-- Start Sidebar -->
        @include('includes.sidebar-admin')
        <!-- End Sidebar -->
        <!-- Start Content -->
        <div id="layoutSidenav_content">
            {{-- Start Content  --}}
            @yield('content')
            {{-- End Contetnt --}}

            {{-- Start Footer --}}
            @include('includes.footer-admin')
            {{-- End Footer --}}
        </div>
        <!-- End Content -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('') }}admin/js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="{{ asset('') }}admin/js/datatables-simple-demo.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('') }}admin/assets/demo/chart-area-demo.js"></script>
    <script src="{{ asset('') }}admin/assets/demo/chart-bar-demo.js"></script>

</body>

</html>
