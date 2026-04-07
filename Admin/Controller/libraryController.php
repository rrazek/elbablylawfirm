<?php
include_once "../../loading.php";
// Define variables and initialize with empty values
$title = $law = "";
$title_err = $law_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once '../Model/Library.php';
    $libary = new Library();
    // echo "loaded";
    if ($_POST["addToLib"]) {
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

        $target_dir = "../../uploads/lib/";
        $file_name = basename($_FILES["fileToUpload"]["name"]);
        $target_file = $target_dir . $file_name;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 4194304) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists. please rename it";
            $uploadOk = 0;
        }

        echo "<br>here";
        // Check input errors before inserting in database
        if (empty($title_err) && empty($law_err)) {
            // Check if $uploadOk is set to 0 by an error
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
            if ($uploadOk == 1) { //step 1 : Get The data from the inputs
                $libary->setFilename($title);
                $libary->setCat($law);
                $libary->setFilepath("uploads/lib/" . $file_name);
                //step 2 , 3 & 4:
                $result = $libary->addFile($libary);

                if ($result == true) {
                    echo '<script>alert("Added ")</script>';
                    echo '<script>location.href="../../adminViewLibrary.php";</script>';
                    //echo '<script>location.href="../../welcome.php";</script>';
                } else {
                    echo '<script>alert("error: file not found")</script>';
                    echo '<script>location.href="../../adminViewLibrary.php";</script>';
                    //     //echo '<script>location.href="../index.html";</script>';
                }
            } else {
                echo '<script>alert("error: library not found")</script>';
                echo '<script>location.href="../../adminViewLibrary.php";</script>';
                //     //echo '<script>location.href="../index.html";</script>';
            }

        }
    }
    if ($_POST["deleteFile"]) {
        if (isset($_POST["id"]) && !empty($_POST["id"])) {
            // Include config file
            echo "deleteing";
            $tmp = $libary->getFile($_POST["id"]);
            unlink("../../" . $tmp[0]->getFilepath());
            $result = $libary->removeFile($_POST["id"]);
            if ($result == true) {
                echo '<script>alert("Deleted ")</script>';
                echo '<script>location.href="../../adminViewLibrary.php";</script>';
                //echo '<script>location.href="../welcome.php";</script>';
            } else {
                echo '<script>alert("error: library not found")</script>';
                echo '<script>location.href="../../adminViewLibrary.php";</script>';
                //echo '<script>location.href="../index.html";</script>';
            }

        } else {
            // Check existence of id parameter
            if (empty(trim($_GET["id"]))) {
                // URL doesn't contain id parameter. Redirect to error page
                // header("location: error.php");
                echo '<script>alert("error: select ID")</script>';
                echo '<script>location.href="../../adminViewLibrary.php";</script>';
            }
        }
    }
    if ($_POST["updateFile"]) {
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

            $target_dir = "../../uploads/lib/";
            $file_name = round(microtime(true)) . basename($_FILES["fileToUpload"]["name"]);
            $target_file = $target_dir . $file_name;
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Check file size
            if ($_FILES["fileToUpload"]["size"] > 4194304) {
                // echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }

            // Check if file already exists
            if (file_exists($target_file)) {
                // echo "Sorry, file already exists. please rename it";
                $uploadOk = 0;
            }

            echo "<br>";
            // Check input errors before inserting in database
            if (empty($title_err) && empty($law_err)) {
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    // echo "Sorry, your file was not uploaded.";
                    // if everything is ok, try to upload file
                    $libary->setFilepath($_POST["oldFile"]);
                } else {
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        // echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
                    } else {
                        //echo "Sorry, there was an error uploading your file.";
                    }
                    $libary->setFilepath("uploads/libs/" . $file_name);
                    unlink($_POST["oldFile"]);
                }
                //step 1 : Get The data from the inputs
                $libary->setFilename($title);
                $libary->setCat($law);
                // var_dump($libary);

                // Include config file
                $result = $libary->updateFile($_POST["id"], $libary);
                // var_dump($result);

                if ($result == true) {
                    echo '<script>alert("Updated ")</script>';
                    echo '<script>location.href="../../adminViewLibrary.php";</script>';
                    //echo '<script>location.href="../welcome.php";</script>';
                } else {
                    echo '<script>alert("error: Library not found")</script>';
                    echo '<script>location.href="../../adminViewLibrary.php";</script>';
                }

            } else {
                // Check existence of id parameter
                if (empty(trim($_GET["id"]))) {
                    // URL doesn't contain id parameter. Redirect to error page
                    // header("location: error.php");
                    echo '<script>alert("error: select ID")</script>';
                    echo '<script>location.href="../../adminViewLibrary.php";</script>';
                }
            }
        }
    }
} else {
    if ($_GET["id"]) {

// include_once "../View/ArticleView.php";
        include_once "../Model/Library.php";
        $librayView = new Library();
        if ($_GET["state"] == 1) {
            echo "hiding";
            $res = $librayView->hideFile($_GET["id"]);
            echo '<script>location.href="../../adminViewLibrary.php";</script>';
        } else {
            echo "showing";
            $res = $librayView->showFile($_GET["id"]);
            echo '<script>location.href="../../adminViewLibrary.php";</script>';
        }
    } else {
        echo '<script>location.href="../../forbidden.php";</script>';
    }
}
// return $res;
