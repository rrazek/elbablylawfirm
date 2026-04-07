
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
                        <h2 class="">إضافة قضية</h2>
                        </div>
                        <p style="text-align: right;">برجاء إدخال بيانات القضية.</p>
                        <form action="Controller/CaseController.php" method="post" enctype="multipart/form-data" style="text-align: right;">
                            <div class="form-group <?php echo (!empty($title_err)) ? 'has-error' : ''; ?>">
                                <label>اسم القضية : </label>
                                <input required type="text" name="title" class="form-control"  >
                                
                            </div>
                            <div class="form-group <?php echo (!empty($cat_err)) ? 'has-error' : ''; ?>">
                                <label>نوع القانون</label>

                                <select name="cat" class="form-control" required>
                                    <option value="null">قم باختيار القانون</option>
                                    <?php
                                        require_once "Model/Case.php";
                                        $caseObj = new CaseClass();
                                        $Result = $caseObj->getCategories();
                                        var_dump($Result);
                                        for ($i = 0; $i < count($Result); $i++) {
                                            echo '<option value="'.$Result[$i]->getCat().'">
                                            '.$Result[$i]->getCatName().'</option>
                                            ';
                                        }

                                    ?>
<!-- 
                                    <option value="القانون التجاري">التجاري</option>
                                    <option value="القانون الجنائي">الجنائي</option>
                                    <option value="القانون الدولي">الدولي</option> -->
                                </select>
                            </div>
                            <div class="form-group <?php echo (!empty($desc_err)) ? 'has-error' : ''; ?>">
                                <label>التفاصيل</label>
                                <textarea required type="text" name="desc" class="form-control" ></textarea>
                                <!-- <span class="help-block"><?php echo $desc_err; ?></span> -->
                            </div>

                            <div class="form-group <?php echo (!empty($date_err)) ? 'has-error' : ''; ?>">
                                <label>التاريخ</label>
                                <input required type="date" name="date" class="form-control"  >
                                <!-- <span class="help-block"><?php echo $date_err; ?></span> -->
                            </div>

                                <input  type="hidden" class="form-control" type="file" name="fileToUpload" value="" />
                            
                            <input type="submit" class="btn btn-primary" value="إضافة القضية" name="addCase">
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