<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- flash-messages -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- ends flash-message -->

  <!-- Favicons -->
  <link href="{{ asset('/')}}assets/img/favicon.png" rel="icon">
  <link href="{{ asset('/')}}assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <!-- <link href="font/css/font-awesome.min.css" rel="stylesheet"> -->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

  <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('/')}}assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('/')}}assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{ asset('/')}}assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="{{ asset('/')}}assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="{{ asset('/')}}assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="{{ asset('/')}}assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="{{ asset('/')}}assets/vendor/simple-datatables/style.css" rel="stylesheet">   

  <!-- yajra datatables -->
  <link  href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

  <!--Main CSS File -->
  <link href="{{ asset('/')}}assets/css/select2.min.css" rel="stylesheet">
  <!-- End -->

  <!--for dropdown CSS File -->
  <link href="{{ asset('/')}}assets/css/style.css" rel="stylesheet">
  <!-- End -->
  </head>

<body>

<!-- ======= Header ======= -->
@include('header')
    <!-- End Header -->

<!-- ======= Sidebar ======= -->
@include('sidebar')
<!-- End Sidebar-->

<!-- ======= main ======= -->
 
<main id = "main" class="main">

<!-- ======= flash-message ======= -->
@include('flash-message')
<!-- End flash-message-->

  @yield('content')
  
    <!-- Scripts -->

</main>
<!-- End main-->

<!-- ======= Footer ======= -->
@include('footer')
<!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{ asset('/') }}/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<script src="{{ asset('/')}}assets/vendor/php-email-form/validate.js"></script>
<script src="{{ asset('/')}}assets/vendor/quill/quill.min.js"></script>
<script src="{{ asset('/')}}assets/vendor/tinymce/tinymce.min.js"></script>
<script src="{{ asset('/')}}assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="{{ asset('/')}}assets/vendor/chart.js/chart.min.js"></script>
<script src="{{ asset('/')}}assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="{{ asset('/')}}assets/vendor/echarts/echarts.min.js"></script>

<!--  Main JS File -->
<script src="{{ asset('/')}}assets/js/main.js"></script>

<!--  for dropdown JS File -->
<script src="{{ asset('/')}}assets/js/select2.min.js"></script>

<!--  for search for dropdown JS File -->
<script src="{{ asset('/')}}assets/js/search.js"></script>

<!-- script for delete specific user confiermation message -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script src="{{ asset('/')}}assets/js/delete.js"></script>

</body>

</html>