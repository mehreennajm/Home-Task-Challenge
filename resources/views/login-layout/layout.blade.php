<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pigment Product Management System |  @yield('title')</title>
    <!-- Favicon icon -->
     <link rel="icon" href="{{asset('assets/images/favicon.ico')}}" type="image/x-icon">
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
    <style>
        body{
            background: url('../../assets/images/background03.jpeg') no-repeat fixed;;  
        }
        .container{
            margin-top:12%;
        }
    </style>
    @include('layout.css-files')
   
</head>
<body class="hold-transition sidebar-mini layout-fixed">

<!-- Container section -->
<div class="wrapper">

<!-- content -->
@yield('content')

<!-- Scripts section -->
@include('layout.scripts')


</div>

</body>

</html>
