<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pigment Product Management System |  @yield('title')</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="Phoenixcoded" />
    @include('layout.css-files')
    <style>
        .alert-success{color:#155724;background-color:#8cd79d;border-color:#8cd79d}
        .actions{
            width: 30%!important;
            text-align: right;
        }
        .actions a, form{
            display: inline!important;
        }
        .actions a {
            color: white!important;
        }
        .card-header h4, button{
            display: inline!important;

        }
        .close_icon{
            color: white;
            font-size: 30px;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">

<!-- Container section -->
<div class="wrapper">

<!-- Sidebar section -->
@include('sidebar.sidebar')

<!-- content -->
@yield('content')

<!-- Sidebar section -->
@include('footer.footer')

<!-- Scripts section -->
@include('layout.scripts')

@yield('customScripts')

</div>

</body>

</html>
