
<?php
    session_start();
    if (! isset($_SESSION['user']) || empty($_SESSION['user'])) {
        // echo 'please Login';
        echo '<script>location.href="../login.php";</script>';

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>حذف الملف</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>حدف افملغ</h1>
                    </div>
                    <form action="Controller/libraryController.php" method="post">
                        <div class="alert alert-danger fade in">
                            <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
                            <p>هل انت متأكد انك تريد ان تحذف هذه الملف ؟ اذا قمت بحذفها لن تستيطع استرجاعها مرة اخري</p><br>
                            <p>
                                <input type="submit" value="حذف" class="btn btn-danger" name="deleteFile">
                                <a href="../adminViewLibrary.php" class="btn btn-default">الرجوع</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>