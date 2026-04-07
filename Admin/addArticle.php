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
                        <h2 class="">إضافة مقالة</h2>
                        </div>
                        <p style="text-align: right;">برجاء إدخال بيانات المقالة.</p>
                        <form action="Controller/ArticleController.php" method="post" enctype="multipart/form-data" style="text-align: right;">
                            <div class="form-group <?php echo (!empty($title_err)) ? 'has-error' : ''; ?>">
                                <label>العنوان</label>
                                <input type="text" name="title" class="form-control"  >
                            </div>
                            <div class="form-group <?php echo (!empty($law_err)) ? 'has-error' : ''; ?>">
                                <label>القانون</label>

                                <select name="law" class="form-control" >
                                    <option value="null">قم باختيار القانون</option>
                                    <option value="القانون التجاري">التجاري</option>
                                    <option value="القانون الجنائي">الجنائي</option>
                                    <option value="القانون الدولي">الدولي</option>
                                </select>
                            </div>
                            <div class="form-group <?php echo (!empty($content_err)) ? 'has-error' : ''; ?>">
                                <label>المحتوي</label>
                                <textarea type="text" name="content" class="form-control"  ></textarea>
                            </div>

                            <div class="form-group">
                                <label>صورة</label>
                                <input class="form-control" type="file" name="fileToUpload" value="" />
                            </div>

                            <input type="submit" class="btn btn-primary" value="حفظ" name="addArticle">
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