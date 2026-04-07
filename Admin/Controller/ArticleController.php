
<?php
include_once "../../loading.php";
// Define variables and initialize with empty values
$title = $law = $content = "";
$title_err = $law_err = $content_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once '../Model/Article.php';
    $article = new Article();

    if ($_POST["addArticle"]) {
        // echo"Adding...";

        // Validate name
        $input_title = trim($_POST["title"]);
        if (empty($input_title)) {
            $title_err = "قم بإضافة عنوان.";
        } else {
            $title = $input_title;
        }

        // Validate address
        $law = trim($_POST["law"]);

        // Validate salary
        $input_content = trim($_POST["content"]);
        if (empty($input_content)) {
            $content_err = "برجاء ادخال محتوي المقالة";
        } else {
            $content = $input_content;
        }

        $target_dir = "../../uploads/";
        $file_name = round(microtime(true)) . basename($_FILES["fileToUpload"]["name"]);
        $target_file = $target_dir . $file_name;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 4194304) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists. please rename it";
            $uploadOk = 0;
        }

        echo "<br>";
        // Check input errors before inserting in database
        if (empty($title_err) && empty($law_err) && empty($content_err)) {
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
                $article->setImage($_POST["oldImg"]);

            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                    $uploadOk = 0;

                }
                $article->setImage("uploads/" . $file_name);
            }
            if ($uploadOk == 1) {
                //step 1 : Get The data from the inputs
                $article->setTitle($title);
                $article->setLawType($law);
                $article->setContent($content);

                //step 2 , 3 & 4:
                $result = $article->addArticle($article);

                if ($result == true) {
                    echo '<script>alert("Added ")</script>';
                    echo '<script>location.href="../../adminViewArticle.php";</script>';
                    //echo '<script>location.href="../../welcome.php";</script>';
                } else {
                    //echo '<script>alert("error: user not found")</script>';
                    //     //echo '<script>location.href="../index.html";</script>';
                }
            } else {
                echo '<script>alert("error: user not added")</script>';
                echo '<script>location.href="../../adminViewArticle.php";</script>';

                //echo '<script>location.href="../index.html";</script>';

            }

        }
    }
    else if ($_POST["deleteArticle"]) {
        if (isset($_POST["id"]) && !empty($_POST["id"])) {
            // Include config file
            $tmp = $article->getArticle($_POST["id"]);
            unlink("../../" . $tmp[0]->getImage());
            $result = $article->removeArticle($_POST["id"]);

            if ($result == true) {
                echo '<script>alert("Deleted ")</script>';
                echo '<script>location.href="../../adminViewArticle.php";</script>';
                //echo '<script>location.href="../welcome.php";</script>';
            } else {
                echo '<script>alert("error: Article not found")</script>';
                echo '<script>location.href="../../adminViewArticle.php";</script>';
                //echo '<script>location.href="../index.html";</script>';
            }

        } else {
            // Check existence of id parameter
            if (empty(trim($_GET["id"]))) {
                // URL doesn't contain id parameter. Redirect to error page
                // header("location: error.php");
                echo '<script>alert("error: select ID")</script>';
            }
        }
    }
    else if ($_POST["updateArticle"]) {
        echo "updating...";
        if (isset($_POST["id"]) && !empty($_POST["id"])) {
            // Validate name
            $input_title = trim($_POST["title"]);
            if (empty($input_title)) {
                $title_err = "قم بإضافة عنوان.";
            } else {
                $title = $input_title;
            }

            // Validate address
            $law = trim($_POST["law"]);

            // Validate salary
            $input_content = trim($_POST["content"]);
            if (empty($input_content)) {
                $content_err = "برجاء ادخال محتوي المقالة";
            } else {
                $content = $input_content;
            }
            $target_dir = "../../uploads/";
            $file_name = round(microtime(true)) . basename($_FILES["fileToUpload"]["name"]);
            $target_file = $target_dir . $file_name;
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            // Check if image file is a actual image or fake image
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check !== false) {
                // echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                // echo "File is not an image.";
                $uploadOk = 0;
            }
            // Check file size
            if ($_FILES["fileToUpload"]["size"] > 4194304) {
                // echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }
            // Allow certain file formats
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif") {
                // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
            // Check if file already exists
            if (file_exists($target_file)) {
                // echo "Sorry, file already exists. please rename it";
                $uploadOk = 0;
            }

            echo "<br>";
            // Check input errors before inserting in database
            if (empty($title_err) && empty($law_err) && empty($content_err)) {
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    // echo "Sorry, your file was not uploaded.";
                    // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        // echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
                    } else {
                        //echo "Sorry, there was an error uploading your file.";
                    }
                }
                //step 1 : Get The data from the inputs
                $article->setTitle($title);
                $article->setLawType($law);
                $article->setContent($content);
                $article->setState($_POST["state"]);
                if ($uploadOk == 1) {
                    $article->setImage("uploads/" . $file_name);
                    unlink("../../" . $_POST["oldImg"]);
                }

                // Include config file
                $result = $article->updateArticle($_POST["id"], $article);
                // var_dump($result);

                if ($result == true) {
                    echo '<script>alert("Updated ")</script>';
                    echo '<script>location.href="../../adminViewArticle.php";</script>';
                    //echo '<script>location.href="../welcome.php";</script>';
                } else {
                    echo '<script>alert("error: Article not found")</script>';
                    echo '<script>location.href="../../adminViewArticle.php";</script>';
                    //echo '<script>location.href="../index.html";</script>';
                }

            } else {
                // Check existence of id parameter
                if (empty(trim($_GET["id"]))) {
                    // URL doesn't contain id parameter. Redirect to error page
                    // header("location: error.php");
                    echo '<script>alert("error: select ID")</script>';
                    echo '<script>location.href="../../adminViewArticle.php";</script>';

                }
            }
        }
    }
} else {
    if ($_GET["id"]) {

// include_once "../View/ArticleView.php";
        include_once "../Model/Article.php";

        $articleView = new Article();
        if ($_GET["state"] == 1) {
            echo "hiding";
            $res = $articleView->hiderArticle($_GET["id"]);
            echo '<script>location.href="../../adminViewArticle.php";</script>';

        } else {
            echo "showing";
            $res = $articleView->showArticle($_GET["id"]);
            echo '<script>location.href="../../adminViewArticle.php";</script>';
        }
    }
    else {
    echo '<script>location.href="../../forbidden.php";</script>';
    }
}
// return $res;
