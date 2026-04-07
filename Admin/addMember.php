

<?php
    session_start();
    if (! isset($_SESSION['user']) || empty($_SESSION['user'])) {
        // echo 'please Login';
        echo '<script>location.href="../login.php";</script>';

    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <?php
    include_once("head.html");
   ?>
    </head>
    <body>
    <?php
include_once "header.html";
?>
    <div class="service"style="direction: rtl;">
        <div class="container">
            <div class="section-header">
                        <h2 class="">إضافة موظف</h2>
                        </div>
                        <p style="text-align: right;">برجاء إدخال بيانات الموظف.</p>
                        <form action="Controller/MemberController.php" method="post" enctype="multipart/form-data" style="text-align: right;">
                            <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                                <label>اسم الموظف</label>
                                <input type="text" name="name" class="form-control"  >
                            </div>
                            <div class="form-group <?php echo (!empty($law_err)) ? 'has-error' : ''; ?>">
                                <label>المنصب</label>

                                <input type="text" name="pos" class="form-control"  >
                                

                            </div>
                            <div class="form-group <?php echo (!empty($bio_err)) ? 'has-error' : ''; ?>">
                                <label>التعريف بالموظف</label>
                                <textarea type="text" name="bio" class="form-control" value="<?php echo $bio; ?>" ></textarea>
                            </div>
                            <div class="form-group <?php echo (!empty($twitter_err)) ? 'has-error' : ''; ?>">
                                <label>تويتر</label>
                                <textarea type="text" name="twitter" class="form-control" value="<?php echo $twitter; ?>" ></textarea>
                            </div>
                            <div class="form-group <?php echo (!empty($facebook_err)) ? 'has-error' : ''; ?>">
                                <label>فيسبوك</label>
                                <textarea type="text" name="facebook" class="form-control" value="<?php echo $facebook; ?>" ></textarea>
                            </div>
                            <div class="form-group <?php echo (!empty($linkedin_err)) ? 'has-error' : ''; ?>">
                                <label>لينكدإن</label>
                                <textarea type="text" name="linkedin" class="form-control" value="<?php echo $linkedin; ?>" ></textarea>
                            </div>
                            <div class="form-group <?php echo (!empty($whatsapp_err)) ? 'has-error' : ''; ?>">
                                <label>واتساب</label>
                                <textarea type="text" name="whatsapp" class="form-control" value="<?php echo $whatsapp; ?>" ></textarea>
                            </div>
                            <div class="form-group">
                                <label>صورة الموظف</label>
                                <input class="form-control" type="file" name="fileToUpload" value="" />
                            </div>

                            <input type="submit" class="btn btn-primary" value="إضافة الموظف" name="addMember">
                            <a href="../index.php" class="btn btn-default">إلغاء</a>
                        </form>
                    </div>
                </div>
 <!-- Footer Start -->
 <?php
      include_once "footer.html";      
      ?>
      <!-- Footer End -->

      <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/easing/easing.min.js"></script>
    <script src="../lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../lib/isotope/isotope.pkgd.min.js"></script>

    <!-- Template Javascript -->
    <script src="../js/main.js"></script>
    </body>
</html>