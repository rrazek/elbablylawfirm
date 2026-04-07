
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
                            <h2 class="">تعديل بيانات الموظف</h2>
                        </div>
                        <p style="text-align: right;">برجاء تعديل بيانات الموظف.</p>
                        <form action="Controller/MemberController.php" method="post" enctype="multipart/form-data" style="text-align: right;">
                            <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                                <label>اسم الموظف</label>
                                <input type="text" name="name" class="form-control" value="<?php echo $Result[0]->getName(); ?>" >
                            </div>
                            <div class="form-group <?php echo (!empty($law_err)) ? 'has-error' : ''; ?>">
                                <label>المنصب</label>

                                <input type="text" name="pos" class="form-control" value="<?php echo $Result[0]->getPosition(); ?>" >

                            </div>
                            <input type="hidden" name="id" value="<?php echo $Result[0]->getId(); ?>"/>
                            <input type="hidden" name="state" value="<?php echo $Result[0]->getStatus(); ?>"/>
                            
                            <input type="hidden" name="oldImg" value="<?php echo $Result[0]->getImage(); ?>"/>
                            
                            
                            <div class="form-group <?php echo (!empty($bio_err)) ? 'has-error' : ''; ?>">
                                <label>التعريف بالموظف</label>
                                <textarea type="text" name="bio" class="form-control"> <?php echo $Result[0]->getBio(); ?></textarea>
                            </div>
                            <div class="form-group <?php echo (!empty($twitter_err)) ? 'has-error' : ''; ?>">
                                <label>تويتر</label>
                                <input type="text" name="twitter" class="form-control" value="<?php echo $Result[0]->getTwitter(); ?>" ></textarea>
                            </div>
                            <div class="form-group <?php echo (!empty($facebook_err)) ? 'has-error' : ''; ?>">
                                <label>فيسبوك</label>
                                <input type="text" name="facebook" class="form-control" value="<?php echo $Result[0]->getFacebook(); ?>" ></textarea>
                            </div>
                            <div class="form-group <?php echo (!empty($linkedin_err)) ? 'has-error' : ''; ?>">
                                <label>لينكدإن</label>
                                <input type="text" name="linkedin" class="form-control" value="<?php echo $Result[0]->getLinkedIn(); ?>" ></textarea>
                            </div>
                            <div class="form-group <?php echo (!empty($whatsapp_err)) ? 'has-error' : ''; ?>">
                                <label>واتساب</label>
                                <input type="text" name="whatsapp" class="form-control" value="<?php echo $Result[0]->getWhatsapp(); ?>" ></textarea>
                            </div>
                            <div class="form-group">
                                <label>صورة الموظف</label>
                                
                                <input class="form-control" type="file" name="fileToUpload" value="<?php echo $Result[0]->getImage(); ?>" />
                            </div>

                            <input type="submit" class="btn btn-primary" value="تعديل بيانات الموظف" name="updateMember">
                            <a href="../index.php" class="btn btn-default">إلغاء</a>
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