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
    include_once("head.html");
   ?>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css"> -->
    <!-- <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script> -->
   
   
</head>
<body>
    <?php
        include_once("header.html");
    ?>
    <div class="service">
        <div class="container">
            <div class="section-header">
                        <h2 class="">الاعضاء</h2>
                        <br>
                        <a href="Admin/addMember.php" class="btn btn-success  animated fadeInUp" > إضافة موظف جديد 
                            <i class="fa fa-plus"></i>
                        </a>
                    </div>
                    <?php
                    // Include config file
                    include_once("Admin/View/MemberView.php");
                    include_once("Admin/Model/Member.php");
                    $articleView = new MemberView();
                    $res = $articleView->Show_AllMembersAdmin(0, -1);      
                    ?>
                    <p><a href="adminIndex.php" class="btn btn-primary">العودة إلي أدوات التحكم</a></p>
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
    <script src="../lib/easing/easing.min.js"></script>
    <script src="../lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../lib/isotope/isotope.pkgd.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>
</html>