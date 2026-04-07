<?php
    session_start();
    if (! isset($_SESSION['user']) || empty($_SESSION['user'])) {
        // echo 'please Login';
        echo '<script>location.href="login.php";</script>';

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <?php
include_once "head.html";
?>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css"> -->
    <!-- <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script> -->


</head>
<body>
    <?php
include_once "header.html";
?>
    <div class="service">
        <div class="container">
            <div class="section-header">
                <h2 class="">ادوات التحكم</h2>
                <br>
                <a href="adminViewArticle.php" class="btn btn-success  animated fadeInUp" > المقالات
                    <i class="fa fa-edit"></i>
                </a>
                <a href="adminViewCase.php" class="btn btn-success  animated fadeInUp" > اشهر القضايا
                    <i class="fa fa-balance-scale"></i>
                </a>
                <a href="adminViewMembers.php" class="btn btn-success  animated fadeInUp" > فريق العمل
                    <i class="fa fa-address-book-o"></i>
                </a>
                <a href="adminViewMessages.php" class="btn btn-success  animated fadeInUp" > الرسائل
                    <i class="fa fa-comments-o"></i>
                </a>
                <a href="adminViewLibrary.php" class="btn btn-success  animated fadeInUp" > المكتبة القانونية
                    <i class="fa fa-book"></i>
                </a>
            </div>
            <?php

?>
        </div>


      <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    </div>
    <!-- Footer Start -->
    <?php
include_once "footer.html";
?>
      <!-- Footer End -->

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>
</html>