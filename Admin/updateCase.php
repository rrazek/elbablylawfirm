
<?php
    session_start();
    if (! isset($_SESSION['user']) || empty($_SESSION['user'])) {
        // echo 'please Login';
        echo '<script>location.href="../login.php";</script>';

    }
?>
<?php
// Check existence of id parameter before processing further
if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
    require_once "Model/Case.php";
    $case = new CaseClass();
    $Result = $case->getCase(trim($_GET["id"]));

    $cats = $case->getCategories();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<?php
include_once "head.html";
?>

 </head>
<body>


<?php
include_once "header.html";
?>
<div class="service"style="direction: rtl;">
            <div class="container">
                    <div class="col-md-12" style="text-align: right;">
                        <div class="page-header">
                            <h2 class="">تعديل بيانات القضية</h2>
                        </div>
                        <p style="text-align: right;">برجاء تعديل بيانات القضية.</p>
                        <form action="Controller/CaseController.php" method="post" enctype="multipart/form-data">
                            <div class="form-group <?php echo (!empty($title_err)) ? 'has-error' : ''; ?>">
                                <label>اسم القضية</label>
                                <input type="text" name="title" class="form-control" value="<?php echo $Result[0]->getName(); ?>" >
                                <!-- <span class="help-block"><?php echo $title_err; ?></span> -->
                            </div>
                            <div class="form-group <?php echo (!empty($cat_err)) ? 'has-error' : ''; ?>">
                                <label>نوع القانون</label>

                                <select name="cat" class="form-control" >
                                        
                                        <?php
                                            for ($i = 0; $i < count($cats); $i++) {
                                                if ($cats[$i]== $Result[0]->getCat())
                                                echo '<option value="'.$cats[$i]->getCat().'" selected="selected>
                                                '.$cats[$i]->getCatName().' </option>
                                                ';
                                                else 
                                                echo '<option value="'.$cats[$i]->getCat().'">
                                                '.$cats[$i]->getCatName().'</option>
                                                ';
                                            }
                                        ?>
                                </select>
                                <!-- <span class="help-block"><?php echo $cat_err; ?></span> -->
                            </div>
                            <div class="form-group <?php echo (!empty($desc_err)) ? 'has-error' : ''; ?>">
                                <label>التفاصيل</label>
                                <textarea type="text" name="desc" class="form-control" ><?php echo $Result[0]->getDescription(); ?></textarea>
                                <!-- <span class="help-block"><?php echo $desc_err; ?></span> -->
                            </div>
                            <input type="hidden" name="id" value="<?php echo $Result[0]->getId(); ?>"/>
                            <input type="hidden" name="state" value="<?php echo $Result[0]->getStatus(); ?>"/>
                            <input type="hidden" name="oldImg" value="<?php echo $Result[0]->getImage(); ?>"/>


                            <div class="form-group <?php echo (!empty($date_err)) ? 'has-error' : ''; ?>">
                                <label>التاريخ</label>
                                <input type="date" name="date" class="form-control" value="<?php echo $Result[0]->getDate(); ?>" >
                                <!-- <span class="help-block"><?php echo $date_err; ?></span> -->
                            </div>

                            <div class="form-group">
                                <label>صورة</label>
                                <input class="form-control" type="file" name="fileToUpload" value="" />
                            </div>

                            <input type="submit" class="btn btn-primary" value="تعديل القضية" name="updateCase">
                            <a href="../adminViewCase.php" class="btn btn-default">Cancel</a>
                        </form>
                    
                    </div>
                </div>
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