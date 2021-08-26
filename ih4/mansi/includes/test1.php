<?php

require $_SERVER['DOCUMENT_ROOT'].'/assets/includes/default.php';
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <?php require $header; ?>
  <title>TEST 1</title>

    <!-- Google Font -->

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300&family=Roboto:wght@300&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Train+One&display=swap" rel="stylesheet">

  </head>
  <body>
    <header id="header" class="fixed-top header-transparent">
     <?php require $nav; ?>
     <h1>Hello World</h1>
</body>
<?php require $footer; ?>
<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
<?php require $footer_js; ?>
</html>