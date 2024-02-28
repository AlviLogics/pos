
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        <title>{{ config('app.name', 'Laravel') }}</title>
        <meta name="description" content="Shop is a Web App and Admin Dashboard Template built with Bootstrap 4">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicons/apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicons/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicons/favicon-16x16.png') }}">


        <link rel="stylesheet" href="{{ asset('font/iconsmind-s/css/iconsminds.css') }}">
        <link rel="stylesheet" href="{{ asset('font/simple-line-icons/css/simple-line-icons.css') }}">

        <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap.rtl.only.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/vendor/fullcalendar.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/vendor/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/vendor/datatables.responsive.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/vendor/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/vendor/select2-bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/vendor/glide.core.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap-stars.css') }}">
        <link rel="stylesheet" href="{{ asset('css/vendor/nouislider.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap-datepicker3.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/vendor/jquery.contextMenu.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/vendor/perfect-scrollbar.css') }}">
        <link rel="stylesheet" href="{{ asset('css/vendor/component-custom-switch.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
        <style>
            table.dataTable thead .sorting:before,
            table.dataTable thead .sorting_asc:before,
            table.dataTable thead .sorting_desc:before,
            table.dataTable thead .sorting_asc_disabled:before,
            table.dataTable thead .sorting_desc_disabled:before {
                content: "";
            }

            table.dataTable thead .sorting:after,
            table.dataTable thead .sorting_asc:after,
            table.dataTable thead .sorting_desc:after,
            table.dataTable thead .sorting_asc_disabled:after,
            table.dataTable thead .sorting_desc_disabled:after {
                content: "";
            }

            table.dataTable td {
                padding: 0;
            }

            table.dataTable thead>tr>td.sorting,
            table.dataTable thead>tr>td.sorting_asc,
            table.dataTable thead>tr>td.sorting_desc,
            table.dataTable thead>tr>th.sorting,
            table.dataTable thead>tr>th.sorting_asc,
            table.dataTable thead>tr>th.sorting_desc {
                text-align: center;
                padding-right: 0;
            }
    </style>
        <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    </head>
    <body id="app-container" class="menu-default show-spinner">
        @include('admin.layouts.header')
        @include('admin.layouts.sidebar')
        <!-- Begin Preloader -->
        
        @yield('content')
        <!-- Begin Page Footer-->
        @include('admin.layouts.footer')
        
        @yield('graphs-data')
    
    <script src="{{ asset('js/vendor/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/vendor/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/vendor/datatables.min.js') }}"></script>
    <script src="{{ asset('js/dore.script.js') }}"></script>
    <script src="{{ asset('js/vendor/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('js/vendor/chartjs-plugin-datalabels.js') }}"></script>
    <script src="{{ asset('js/vendor/moment.min.js') }}"></script>
    <script src="{{ asset('js/vendor/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('js/vendor/progressbar.min.js') }}"></script>
    <script src="{{ asset('js/vendor/jquery.barrating.min.js') }}"></script>
    <script src="{{ asset('js/vendor/select2.full.js') }}"></script>
    <script src="{{ asset('js/vendor/nouislider.min.js') }}"></script>
    <script src="{{ asset('js/vendor/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('js/vendor/Sortable.js') }}"></script>
    <script src="{{ asset('js/vendor/mousetrap.min.js') }}"></script>
    <script src="{{ asset('js/vendor/glide.min.js') }}"></script>

    <script src="{{ asset('js/vendor/jquery.contextMenu.min.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <!-- <script src="{{ asset('js/notification.js') }}"></script> -->

    <script src="{{ asset('js/vendor/bootstrap-tagsinput.min.js') }}"></script>
    @yield('scripts')
    @yield('chart-script')
    @yield('countries-script')
</body>

</html>