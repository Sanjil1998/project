<!doctype html>
<html lang="en">

<!-- Mirrored from demo.thedevelovers.com/dashboard/klorofil-v2.0/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 10 Jun 2020 06:04:47 GMT -->
<head>
    <title>Dashboard | Sanjil Shakya| My Curriculum Viti</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{URL::to('/')}}/public/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{URL::to('/')}}/public/assets/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{URL::to('/')}}/public/assets/vendor/linearicons/style.css">
    <link rel="stylesheet" href="{{URL::to('/')}}/public/assets/vendor/chartist/css/chartist-custom.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{URL::to('/')}}/public/assets/css/main.css">

    <!-- Custom  Css -->
    <link rel="stylesheet" href="{{URL::to('/')}}/public/assets/css/custom.css">

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">

    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="{{URL::to('/')}}/public/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="{{URL::to('/')}}/public/assets/img/favicon.png">
    <!-- Simple Lightbox Styles -->
    <link rel="stylesheet" href="{{URL::to('/')}}/public/assets/vendor/simplelightbox/simple-lightbox.css">
    {{-- datatable css  --}}

</head>
<body>
    <!-- WRAPPER -->

    @yield('header')
    @yield('content')
    @yield('footer')

    <!-- WRAPPER -->


    <!-- Javascript -->
    <script src="{{URL::to('/')}}/public/assets/vendor/jquery/jquery.min.js"></script>
    <script src="{{URL::to('/')}}/public/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{URL::to('/')}}/public/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="{{URL::to('/')}}/public/assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
    <script src="{{URL::to('/')}}/public/assets/vendor/chartist/js/chartist.min.js"></script>
    <script src="{{URL::to('/')}}/public/assets/scripts/klorofil-common.js"></script>

    <!-- Simple LightBox Scripts -->
    <script src="{{URL::to('/')}}/public/assets/vendor/simplelightbox/simple-lightbox.js"></script>

    @yield('scripts')



</body>

<!-- Mirrored from demo.thedevelovers.com/dashboard/klorofil-v2.0/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 10 Jun 2020 06:05:04 GMT -->
</html>
