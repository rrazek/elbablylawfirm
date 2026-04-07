<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8" />
    <title>El-Bably - Law Firm</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="El El-Bably Law Firm" name="keywords" />
    <meta content="El-Bably Law Firm" name="description" />

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon" />

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@1,600;1,700;1,800&family=Roboto:wght@400;500&display=swap" rel="stylesheet"> 
        
        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>
        <div class="wrapper">
            <!-- Top Bar Start -->
            <?php
             require_once "header.html";
            ?>
            <!-- Nav Bar End -->
            
            <!-- Service Start -->
            <div class="service">
                <div class="container">
                    <div class="section-header">
                        <h2>احكام النقض </h2>
                    </div>
                    <div class="row">
                    
                    <div class="col-12">
                        <ul class="list-group">
                            <?php
                                require_once("Admin/View/LibraryView.php");
                                require_once("Admin/Model/Library.php");
                                $libView = new LibraryView();
                                $res = $libView->Show_AllFiles(0, -1,3);

                            ?>
                            
                        
                        </ul>
                    </div>
                   
                    </div>
                </div>
            </div>
            <!-- Service End -->

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
