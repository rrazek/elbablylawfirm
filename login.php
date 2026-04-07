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
                <h2 class="">تسجيل الدخول</h2>
                <br>
                <div class="row">
                <div class="col-md-12">
                            <div class="contact-form" >
                                <form action="Admin/Controller/loginController.php" method="post"  enctype="multipart/form-data">
                                    <div class="form-group" style="direction:rtl;text-align:right">
                                        <input type="text" name ="username" class="form-control" placeholder="اسم المستخدم" required="required" />
                                    </div>
                                    <div class="form-group" style="direction:rtl;text-align:right">
                                        <input type="password" name="password" class="form-control" placeholder="الرقم السري " required="required" />
                                    </div>
                                    <div>
                                        <input type="submit" class="btn btn-primary" value="تسجيل الدخول" name="login">
                                    </div>
                                </form>
                            </div>  
                        </div>
                </div>
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