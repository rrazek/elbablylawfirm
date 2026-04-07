<!DOCTYPE html>
<html lang="en">
    <head>
    <?php
        include_once "head.html";
    ?>
    <style>
        .row{
            text-align:right;
            direction:rtl;
            text-align:justify;
        }
        
        </style>
    </head>

    <body>
        <div class="wrapper">
            <!-- Top Bar Start -->
            <?php
                include_once "header.html";
            ?>
            <!-- Top Bar End -->




            <!-- Page Header Start -->
            <!-- <div class="page-header">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2>Single Page</h2>
                        </div>
                        <div class="col-12">
                            <a href="">Home</a>
                            <a href="">Single Page</a>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- Page Header End -->


            <!-- Single Page Start -->
            <div class="single">
                <div class="container">
                    <?php
include_once "Admin/View/CaseView.php";
include_once "Admin/Model/Case.php";
$caseView = new CaseView();
$res = $caseView->ShowCase($_GET["id"]);
?>
                </div>
            </div>
            <!-- Single Page End -->


            <!-- Newsletter Start -->
            <!-- <div class="newsletter">
                <div class="container">
                    <div class="section-header">
                        <h2>Subscribe Our Newsletter</h2>
                    </div>
                    <div class="form">
                        <input class="form-control" placeholder="Email here">
                        <button class="btn">Submit</button>
                    </div>
                </div>
            </div> -->
            <!-- Newsletter End -->


           <!-- Footer Start -->
           <?php
            require_once "footer.html";
            ?>
            <!-- Footer End -->

            <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        </div>

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
