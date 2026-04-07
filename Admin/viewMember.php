
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
    require_once "Model/Member.php";
    $member = new Member();
    $Result = $member->getMember(trim($_GET["id"]));
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
                        <h2 class="">عرض بيانات موظف</h2>
                        </div>
                        <!-- <p style="text-align: right;">برجاء إدخال بيانات الموظف.</p> -->
                        <form action="Controller/MemberController.php" method="post" enctype="multipart/form-data" style="text-align: right;">
                            <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                                <label>اسم الموظف</label>
                                <p class="form-control-static"><?php echo $Result[0]->getName(); ?></p>
                            </div>
                            <div class="form-group <?php echo (!empty($law_err)) ? 'has-error' : ''; ?>">
                                <label>المنصب</label>
                                <p class="form-control-static"><?php echo $Result[0]->getPosition(); ?></p>


                            </div>
                            <div class="form-group <?php echo (!empty($bio_err)) ? 'has-error' : ''; ?>">
                                <label>التعريف بالموظف</label>
                                <p class="form-control-static"><?php echo $Result[0]->getBio(); ?></p>

                            </div>
                            <div class="form-group <?php echo (!empty($twitter_err)) ? 'has-error' : ''; ?>">
                                <label>تويتر</label>
                                <p class="form-control-static"><?php echo $Result[0]->getTwitter(); ?></p>
                            </div>
                            <div class="form-group <?php echo (!empty($facebook_err)) ? 'has-error' : ''; ?>">
                                <label>فيسبوك</label>
                                <p class="form-control-static"><?php echo $Result[0]->getFacebook(); ?></p>

                            </div>
                            <div class="form-group <?php echo (!empty($linkedin_err)) ? 'has-error' : ''; ?>">
                                <label>لينكدإن</label>
                                <p class="form-control-static"><?php echo $Result[0]->getLinkedIn(); ?></p>
                            </div>
                            <div class="form-group <?php echo (!empty($whatsapp_err)) ? 'has-error' : ''; ?>">
                                <label>واتساب</label>
                                <p class="form-control-static"><?php echo $Result[0]->getWhatsapp(); ?></p>
                            </div>
                            <div class="form-group">
                                <label>صورة الموظف</label>
                                <br>
                                <?php $link = "../".$Result[0]->getImage(); ?>
                                <img src="<?php echo $link ?>" alt="Team Image" />
                                
                            </div>
                            <p><a href="../adminViewMembers.php" class="btn btn-primary">العودة</a></p>
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