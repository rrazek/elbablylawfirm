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
                 include_once "header.html";
            ?>
            <!-- Nav Bar End -->

            

            <!-- Consult Start -->
            <div class="contact">
                <div class="container">
                    <div class="section-header">
                        <h2> احجز استشارة  </h2>
                    </div>
                    <div style= "text-align:right;">
                    
                    </div>
                    
                    <div class="row">
                    
                        <!-- <div class="col-md-6">
                            <div class="contact-info">
                                <div class="contact-item">
                                    <i class="fa fa-map-marker-alt"></i>
                                    <div class="contact-text">
                                        <h2>العنوان</h2>
                                        <p> ١ ميدان مصطفى محمود ، الجيزة ، مصر </p>
                                    </div>
                                </div>
                                <div class="contact-item">
                                    <i class="fa fa-phone-alt"></i>
                                    <div class="contact-text">
                                        <h2>تليفون</h2>
                                        <p>(+02) 3305 9992</p>
                                    </div>
                                </div>
                                <div class="contact-item">
                                    <i class="fa fa-mobile"></i>
                                    <div class="contact-text">
                                        <h2>موبايل</h2>
                                        <p>(+20) 114 444 8781 </p>
                                    </div>
                                </div>
                                <div class="contact-item">
                                    <i class="fa fa-envelope"></i>
                                    <div class="contact-text">
                                        <h2>Email</h2>
                                        <p>samir@elbablylawfirm.com</p>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-md-2"></div>
                        <div class="col-md-8" style="text-align:center;">
                            <div class="contact-form">
                               <form action="Admin/Controller/MessageController.php" method="post"  enctype="multipart/form-data">
                                    <div class="form-group">
                                        <input type="text" name ="title" class="form-control" placeholder="الأسم" required="required" />
                                    </div>
                                    <div class="form-group">
                                        <input type="phone" name="phone" class="form-control" placeholder="رقم التليفون " required="required" />
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" placeholder="البريد الإلكتروني" required="required" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="type" class="form-control" placeholder="حدد نوع الإستشارة" required="required" />
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" name="content" placeholder="الرسالة" required="required" ></textarea>
                                    </div>
                                    <div>
                                        <input type="submit" class="btn btn-primary" value="إرسال" name="addMessage">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Contact End -->




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
