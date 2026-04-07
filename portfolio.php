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
            
            
            <!-- Page Header Start -->
            <!-- <div class="page-header">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2>اشهر قضايا المكتب</h2>
                        </div>
                        <div class="col-12">
                            <a href="">الرئيسية</a>
                            <a href="">اشهر قضايا المكتب</a>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- Page Header End -->


            <!-- Portfolio Start -->
            <div class="portfolio">
                <div class="container">
                    <div class="section-header">
                        <h2>اشهر قضايا المكتب</h2>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <ul id="portfolio-flters">
                                <li data-filter="*" class="filter-active">الكل</li>
                                <li data-filter=".first">جنائي</li>
                                <li data-filter=".second">تجاري</li>
                                <li data-filter=".third">مجلس الدولة</li>
                            </ul>
                        </div>
                    </div>
                    <div class="row portfolio-container">
                        <?php
                             require_once("Admin/View/CaseView.php");
                             require_once("Admin/Model/Case.php");
                             $caseView = new CaseView();
                             $res = $caseView->Show_AllCases(1, -1);
                        ?>
                        <!-- <div class="col-lg-4 col-md-6 col-sm-12 portfolio-item first">
                            <div class="portfolio-wrap">
                                <img src="img/portfolio-1.jpg" alt="Portfolio Image">
                                <figure>
                                    <p>Crime</p>
                                    <a href="#">Murder Case</a>
                                    <span>01-Jan-2045</span>
                                </figure>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 portfolio-item second">
                            <div class="portfolio-wrap">
                                <img src="img/portfolio-2.jpg" alt="Portfolio Image">
                                <figure>
                                    <p>Politics</p>
                                    <a href="#">Political Case</a>
                                    <span>01-Jan-2045</span>
                                </figure>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 portfolio-item third">
                            <div class="portfolio-wrap">
                                <img src="img/portfolio-3.jpg" alt="Portfolio Image">
                                <figure>
                                    <p>Family</p>
                                    <a href="#">Divorce Case</a>
                                    <span>01-Jan-2045</span>
                                </figure>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 portfolio-item first">
                            <div class="portfolio-wrap">
                                <img src="img/portfolio-4.jpg" alt="Portfolio Image">
                                <figure>
                                    <p>Finance</p>
                                    <a href="#">Money Laundering</a>
                                    <span>01-Jan-2045</span>
                                </figure>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 portfolio-item second">
                            <div class="portfolio-wrap">
                                <img src="img/portfolio-5.jpg" alt="Portfolio Image">
                                <figure>
                                    <p>Business</p>
                                    <a href="#">Weber & Partners</a>
                                    <span>01-Jan-2045</span>
                                </figure>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 portfolio-item third">
                            <div class="portfolio-wrap">
                                <img src="img/portfolio-6.jpg" alt="Portfolio Image">
                                <figure>
                                    <p>Finance</p>
                                    <a href="#">Property Sharing Case</a>
                                    <span>01-Jan-2045</span>
                                </figure>
                            </div>
                        </div> -->
                    </div>
                    <!-- <div class="row">
                        <div class="col-12 load-more">
                            <a class="btn" href="#">Load More</a>
                        </div>
                    </div> -->
                </div>
            </div>
            <!-- Portfolio Start -->


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
