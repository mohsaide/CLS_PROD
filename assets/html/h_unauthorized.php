<?php 
session_start(); 
if (!empty($_SESSION)) {
  session_destroy();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>CLS - Sign in</title>

  <!-- Favicons -->
  <link href="../img/logo.jpg" rel="icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../css/land_main.css" rel="stylesheet">
  <link href="../css/login.css" rel="stylesheet">

</head>

<body>

  <header id="header" class="header d-flex align-items-center">

    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="../../index.php" class="logo d-flex align-items-center">
        <img src="../img/logo.jpg" alt="logo">
        <h1>CLS<span>.</span></h1>
      </a>

    </div>
  </header><!-- End Header -->
  <!-- End Header -->

  <main id="main">


  <div class="container" style='height:90vh !important;'>
  <div class="row justify-content-center">
    <div class="col-sm-12 col-md-6 text-center">
      <img src="../img/statics/unauthorized.svg" class="img-fluid pt-5" alt="Avatar">
      <h1 class="mt-4 mb-3" style='color:#008374;'>Unauthorized</h1>
      <p>You are not authorized to access this page.</p>
      <p>Please <a href="h_login.php">log in</a> to continue.</p>
    </div>
  </div>
</div>

  </main><!-- End #main -->


 
  <?php
    include('h_footer.php');
  ?> 
   

  <!-- Vendor JS Files -->
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


  <!-- Template Main JS File -->
  <script src="../js/login.js"></script>


</body>

</html>

