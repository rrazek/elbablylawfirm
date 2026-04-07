
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
include_once "head.html";
?>
    <meta charset="UTF-8">
    <title>View Article</title>
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <?php
include_once "header.html";
?>
    <div class ="service">
        <div class="container">
            <div class="section-header">
                    <div class=>
                        <h1> عرض المقالة</h1>
                    </div>
                    <div class="form-group">
                    <label>العنوان : </label>
                        <p class="form-control-static"><?php echo $Result[0]->getId(); ?></p>
                    </div>
                    <div class="form-group">
                    <label>القانون :</label>
                        <p class="form-control-static"><?php echo $Result[0]->getLawType(); ?></p>
                    </div>
                    <div class="form-group">
                    <label>المحتوي :</label>
                        <p class="form-control-static"><?php echo $Result[0]->getContent(); ?></p>
                    </div>
                    <div class="form-group">
                    <label>تاريخ المقالة :</label>
                        <p class="form-control-static"><?php echo $Result[0]->getDate(); ?></p>
                    </div>
                    <div class="form-group">
                    <label>الحالة :</label>
                        <p class="form-control-static"><?php echo $Result[0]->getStateName(); ?></p>
                    </div>



                    <div class="form-group">
                    <label>صورة المقالة :</label>
                    <br>
                    <img src="../<?php echo $Result[0]->getImage(); ?>" alt="Blog">
                    </div>
                    <p><a href="../adminViewArticle.php" class="btn btn-primary">العودة</a></p>
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