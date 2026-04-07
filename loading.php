<!DOCTYPE html>
<html lang="id" dir="ltr">

<head>
     <?php
include_once "head.html";
?>
     <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css"> -->
     <!-- <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.css"> -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


     <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
     <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script> -->


</head>

<body>
     <?php
include_once "header.html";
?>
     <div class="service">

          <div class="container">
               <div class="row" style="direction: rtl;text-align:right">
                    <div class="col-md-2 text-center">
                         <p><i class="fa fa-clock-o fa-5x"></i><br /> </p>
                    </div>
                    <div class="col-md-10">
                         <h3 class="text-warning">برجاء الانتظار</h3>
                         <p>جاري تنفيذ طلبك.</p>
                         <div class="spinner-border text-dark" role="status">
                              <span class="sr-only" style="color:white">جاري التحميل...</span>
                         </div>
                    </div>
               </div>
          </div>
     </div>
     <?php
require_once "footer.html";
?>
</body>

</html>