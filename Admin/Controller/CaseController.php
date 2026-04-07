<?php
include_once "../../loading.php";
// Define variables and initialize with empty values
$title = $desc = $cat = $date = "";
$title_err = $desc_err = $cat_err = $date_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once '../Model/Case.php';
    $case = new CaseClass();

    if ($_POST["addCase"]) {
        // echo"Adding...";

        // Validate name
        $input_title = trim($_POST["title"]);
        if (empty($input_title)) {
            $title_err = "قم بإضافة عنوان.";
        } else {
            $title = $input_title;
        }

        // Validate address
        $cat_content = trim($_POST["cat"]);
        if ($cat_content == "null") {
            $cat_err = "برجاء اختيار القانون";
        } else {
            $cat = $cat_content;
        }

        // Validate salary
        $input_desc = trim($_POST["desc"]);
        if (empty($input_desc)) {
            $content_desc = "برجاء ادخال تفاصيل القضية";
        } else {
            $desc = $input_desc;
        }

        $input_date = trim($_POST["date"]);
        if (empty($input_date)) {
            $date_err = "برجاء ادخال تاريخ القضية";
        } else {
            $date = $input_date;
        }

        //validate Image
        $target_dir = "../../uploads/cases/";
        $file_name = "";
        $uploadOk = 0;
        $default_file = false;
        echo $_FILES["fileToUpload"]["tmp_name"];
        if ($_FILES["fileToUpload"]["tmp_name"]=="") {
            echo "no file uploaded";
            $val ="";
            if ($cat == 1) //gena2y
            {
                $val = "carousel-1.jpg";
            } else if ($cat == 2) //togary
            {
                $val = "carousel-3.jpg";
            } else if ($cat == 3) //mgls dawla
            {
                $val = "carousel-2.jpg";
            }
            echo 'copying from : ../../img/' . $val;
            echo '<br> copying to : '. $target_dir;
            if(copy("../../img/" . $val, $target_dir."".$val))
            echo "copied";
            else echo "not copied";
            $file_name = round(microtime(true)) . $val;
            if(rename($target_dir . "" . $val, $file_name))
            echo "renamed";
            else echo "not renamed";
            if (rename($file_name,$target_dir."".$file_name))
            echo "done";
            $default_file = true;
        } else {
            echo "uploaded file";
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
        }
        echo "<br>";

        // Check input errors before inserting in database
        if (empty($title_err) && empty($cat_err) && empty($desc_err) && empty($date_err)) {
            // Check if $uploadOk is set to 0 by an error
            if ($default_file = true) {
                echo "default fileName".$file_name;
                $case->setImage("uploads/cases/" . $file_name);
            } else {
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                    // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                        $uploadOk = 0;
                    }
                }
                if ($uploadOk == 1) {
                    $case->setImage("uploads/cases/" . $file_name);
                }
            }
            //step 1 : Get The data from the inputs
            $case->setName($title);
            $case->setCat($cat);
            $case->setDescription($desc);
            $case->setDate($date);

            //step 2 , 3 & 4:
            $result = $case->addCase($case);

            if ($result == true) {
                echo '<script>alert("Added ")</script>';
                echo '<script>location.href="../../adminViewCase.php";</script>';
                //echo '<script>location.href="../../welcome.php";</script>';
            } else {
                echo '<script>alert("error: case wasn\'t added")</script>';
                echo '<script>location.href="../../adminViewCase.php";</script>';
                //     //echo '<script>location.href="../index.html";</script>';
            }

        }
    }
    if ($_POST["deleteCase"]) {
        if (isset($_POST["id"]) && !empty($_POST["id"])) {
            // Include config file
            $tmp = $case->getCase($_POST["id"]);
            unlink("../../" . $tmp[0]->getImage());
            $result = $case->removeCase($_POST["id"]);

            if ($result == true) {
                echo '<script>alert("Deleted ")</script>';
                echo '<script>location.href="../../adminViewCase.php";</script>';
                //echo '<script>location.href="../welcome.php";</script>';
            } else {
                echo '<script>alert("error: Case not found")</script>';
                echo '<script>location.href="../../adminViewCase.php";</script>';
                //echo '<script>location.href="../index.html";</script>';
            }

        } else {
            // Check existence of id parameter
            if (empty(trim($_GET["id"]))) {
                // URL doesn't contain id parameter. Redirect to error page
                // header("location: error.php");
                echo '<script>alert("error: select ID")</script>';
                echo '<script>location.href="../../adminViewCase.php";</script>';
            }
        }
    }
    if ($_POST["updateCase"]) {
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
            $cat_content = trim($_POST["cat"]);
            if ($cat_content == "null") {
                $cat_err = "برجاء اختيار القانون";
            } else {
                $cat = $cat_content;
            }

            // Validate salary
            $input_desc = trim($_POST["desc"]);
            if (empty($input_desc)) {
                $content_desc = "برجاء ادخال تفاصيل القضية";
            } else {
                $desc = $input_desc;
            }

            $input_date = trim($_POST["date"]);
            if (empty($input_date)) {
                $date_err = "برجاء ادخال تاريخ القضية";
            } else {
                $date = $input_date;
            }

            $target_dir = "../../uploads/cases/";
            $file_name = round(microtime(true)) . basename($_FILES["fileToUpload"]["name"]);
            $target_file = $target_dir . $file_name;
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            // Check if image file is a actual image or fake image
            if(!empty($_FILES["fileToUpload"]["tmp_name"]))
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
            if (empty($title_err) && empty($cat_err) && empty($desc_err) && empty($date_err)) {
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    // echo "Sorry, your file was not uploaded.";
                    // if everything is ok, try to upload file
                    $case->setImage($_POST["oldImg"]);
                } else {
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        // echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
                    } else {
                        //echo "Sorry, there was an error uploading your file.";
                    }
                    $case->setImage("uploads/cases/" . $file_name);
                    
                }
                //step 1 : Get The data from the inputs
                $case->setName($title);
                $case->setCat($cat);
                $case->setDescription($desc);
                $case->setDate($date);
                if ($uploadOk == 1) {
                    $case->setImage("uploads/cases/" . $file_name);
                    unlink("../../" . $_POST["oldImg"]);
                }

                // Include config file
                $result = $case->updateCase($_POST["id"], $case);

                if ($result == true) {
                    echo '<script>alert("Updated ")</script>';
                    echo '<script>location.href="../../adminViewCase.php";</script>';
                    //echo '<script>location.href="../welcome.php";</script>';
                } else {
                    echo '<script>alert("error: Case not found")</script>';
                    echo '<script>location.href="../../adminViewCase.php";</script>';
                    //echo '<script>location.href="../index.html";</script>';
                }

            } else {
                // Check existence of id parameter
                if (empty(trim($_GET["id"]))) {
                    // URL doesn't contain id parameter. Redirect to error page
                    // header("location: error.php");
                    echo '<script>alert("error: select ID")</script>';
                    echo '<script>location.href="../../adminViewCase.php";</script>';
                }
            }
        }
    }
} else {
    if ($_GET["id"]) {

// include_once "../View/ArticleView.php";
        include_once "../Model/Case.php";

        $case = new CaseClass();
        if ($_GET["state"] == 1) {
            echo "hiding";
            $res = $case->hideCase($_GET["id"]);
            echo '<script>location.href="../../adminViewCase.php";</script>';
        } else {
            echo "showing";
            $res = $case->showCase($_GET["id"]);
            echo '<script>location.href="../../adminViewCase.php";</script>';

        }
    } else {
        echo '<script>location.href="../../forbidden.php";</script>';
        }
}
// return $res;
