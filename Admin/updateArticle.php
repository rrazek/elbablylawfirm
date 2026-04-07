
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
    require_once "Model/Article.php";
    $article = new Article();
    $Result = $article->getArticle(trim($_GET["id"]));
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
                    <div class="col-md-12" style="text-align: right;">
                        <div class="page-header">
                            <h2>تعديل المقالة </h2>
                        </div>
                        <p>برجاء ملء البيانات المراد تعديلها.</p>
                        <form action="Controller/ArticleController.php" method="post" enctype="multipart/form-data">
                            <div class="form-group <?php echo (!empty($title_err)) ? 'has-error' : ''; ?>">
                                <label>العنوان</label>
                                <input type="text" name="title" class="form-control" value="<?php echo $Result[0]->getTitle(); ?>" >
                            </div>
                            <div class="form-group <?php echo (!empty($law_err)) ? 'has-error' : ''; ?>">
                                <label>القانون</label>

                                <select name="law" class="form-control" >
                                    <option value="null"<?=$Result[0]->getLawType() == 'null' ? ' selected="selected"' : '';?>>" >قم باختيار القانون</option>
                                    <option value="القانون التجاري"
                                        <?=$Result[0]->getLawType() == 'القانون التجاري' ? ' selected="selected"' : '';?>>التجاري
                                    </option>
                                    <option value="القانون الجنائي"
                                         <?=$Result[0]->getLawType() == 'القانون الجنائي' ? ' selected="selected"' : '';?>>الجنائي
                                    </option>
                                    <option value="القانون الدولي" 
                                        <?=$Result[0]->getLawType() == 'القانون الدولي' ? ' selected="selected"' : '';?>>الدولي
                                    </option>
                                </select>
                            </div>
                            <div class="form-group <?php echo (!empty($content_err)) ? 'has-error' : ''; ?>">
                                <label>المحتوي</label>
                                <?php var_dump($Result[0]->getContent());?>
                                <textarea type="text" name="content" class="form-control" ><?php echo $Result[0]->getContent(); ?>
                                </textarea>
                            </div>
                            <input type="hidden" name="id" value="<?php echo $Result[0]->getId(); ?>"/>
                            <input type="hidden" name="state" value="<?php echo $Result[0]->getState(); ?>"/>
                            <input type="hidden" name="oldImg" value="<?php echo $Result[0]->getImage(); ?>"/>



                            <div class="form-group">
                                <label>صورة</label>
                                <input class="form-control" type="file" name="fileToUpload" value="" />
                            </div>

                            <input type="submit" class="btn btn-primary" value="Submit" name="updateArticle">
                            <a href="../index.php" class="btn btn-default">Cancel</a>
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