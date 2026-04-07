<?php
include_once "../../loading.php";
// Define variables and initialize with empty values
$name = $pos = $bio = $facebook = $linkedin = $twitter = $whatsapp = "";
$name_err = $pos_err = $bio_err = $facebook_err = $linkedin_err = $twitter_err = $whatsapp_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once '../Model/Member.php';
    $Member = new Member();

    if ($_POST["addMember"]) {
        // echo"Adding...";

        // Validate name
        $input_title = trim($_POST["name"]);
        if (empty($input_title)) {
            $title_err = "قم بإضافة اسم الموظف.";
        } else {
            $title = $input_title;
        }

        // Validate address
        $pos = trim($_POST["pos"]);

        // Validate salary
        $input_bio = trim($_POST["bio"]);
        if (empty($input_bio)) {
            $input_bio = "برجاء ادخال تعريف بالموظف";
        } else {
            $bio = $input_bio;
        }

        $target_dir = "../../uploads/emps/";
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
        if (empty($name_err) && empty($pos_err) && empty($bio_err && $uploadOk == 1)) {
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
            if ($uploadOk == 1) {
                //step 1 : Get The data from the inputs
                $Member->setName($title);
                $Member->setPosition($pos);
                $Member->setBio($bio);
                $Member->setFacebook(trim($_POST["facebook"]));
                $Member->setTwitter(trim($_POST["twitter"]));
                $Member->setWhatsapp("https://wa.me/2" . trim($_POST["whatsapp"]));
                $Member->setLinkedIn(trim($_POST["linkedin"]));
                $Member->setImage("uploads/emps/" . $file_name);

                //step 2 , 3 & 4:
                $result = $Member->addMember($Member);

                if ($result == true) {
                    echo '<script>alert("Added ")</script>';
                    echo '<script>location.href="../../adminViewMembers.php";</script>';
                    //echo '<script>location.href="../../welcome.php";</script>';
                } else {
                    echo '<script>alert("error: user not found")</script>';
                    echo '<script>location.href="../../adminViewMembers.php";</script>';
                    //     //echo '<script>location.href="../index.html";</script>';
                }
            } else {
                echo '<script>alert("error: user not found")</script>';
                //     //echo '<script>location.href="../index.html";</script>';
            }

        }
    }
    if ($_POST["deleteMember"]) {
        if (isset($_POST["id"]) && !empty($_POST["id"])) {
            echo "getting file";
            $tmp = $Member->getMember($_POST["id"]);
            echo " deleteing file";
            unlink("../../" . $tmp[0]->getImage());
            echo "deleteing data";
            $result = $Member->removeMember($_POST["id"]);

            if ($result == true) {
                echo '<script>alert("Deleted ")</script>';
                echo '<script>location.href="../../adminViewMembers.php";</script>';
            } else {
                echo '<script>alert("error: Member not found")</script>';
                echo '<script>location.href="../../adminViewMembers.php";</script>';
                //echo '<script>location.href="../index.html";</script>';
            }

        } else {
            // Check existence of id parameter
            if (empty(trim($_GET["id"]))) {
                // URL doesn't contain id parameter. Redirect to error page
                // header("location: error.php");
                echo '<script>alert("error: select ID")</script>';
                echo '<script>location.href="../../adminViewMembers.php";</script>';
            }
        }
    }
    if ($_POST["updateMember"]) {
        echo "updating...";
        if (isset($_POST["id"]) && !empty($_POST["id"])) {
            // Validate name
            echo "asd";

            $input_title = trim($_POST["name"]);
            if (empty($input_title)) {
                $title_err = "قم بإضافة اسم الموظف.";
            } else {
                $title = $input_title;
            }

            // Validate address
            $pos = trim($_POST["pos"]);

            // Validate salary
            $input_bio = trim($_POST["bio"]);
            if (empty($input_bio)) {
                $input_bio = "برجاء ادخال تعريف بالموظف";
            } else {
                $bio = $input_bio;
            }
            $target_dir = "../../uploads/emps/";
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
            if (empty($title_err) && empty($law_err) && empty($content_err)) {
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    // echo "Sorry, your file was not uploaded.";
                    // if everything is ok, try to upload file
                    $Member->setImage($_POST["oldImg"]);
                } else {
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        // echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
                    } else {
                        //echo "Sorry, there was an error uploading your file.";
                    }
                }

                //step 1 : Get The data from the inputs
                $Member->setName($title);
                $Member->setPosition($pos);
                $Member->setBio($bio);
                $Member->setFacebook(trim($_POST["facebook"]));
                $Member->setTwitter(trim($_POST["twitter"]));
                $Member->setWhatsapp("https://wa.me/2" . trim($_POST["whatsapp"]));
                $Member->setLinkedIn(trim($_POST["linkedin"]));
                if ($uploadOk == 1) {
                    $Member->setImage("uploads/emps/" . $file_name);
                    unlink($_POST["oldImg"]);
                }

                // Include config file
                $result = $Member->updateMember($_POST["id"], $Member);
                //var_dump($result);

                if ($result == true) {
                    echo '<script>alert("Updated ")</script>';
                    echo '<script>location.href="../../adminViewMembers.php";</script>';
                    //echo '<script>location.href="../welcome.php";</script>';
                } else {
                    echo '<script>alert("error: Member not found")</script>';
                    echo '<script>location.href="../../adminViewMembers.php";</script>';
                    //echo '<script>location.href="../index.html";</script>';
                }

            } else {
                // Check existence of id parameter
                if (empty(trim($_GET["id"]))) {
                    // URL doesn't contain id parameter. Redirect to error page
                    // header("location: error.php");
                    echo '<script>alert("error: select ID")</script>';
                    echo '<script>location.href="../../adminViewMembers.php";</script>';
                }
            }
        }
    }
} else {
    if ($_GET["id"]) {

// include_once "../View/ArticleView.php";
        include_once "../Model/Member.php";

        $Member = new Member();
        if ($_GET["state"] == 1) {
            echo "hiding";
            $res = $Member->hideMember($_GET["id"]);
            echo '<script>location.href="../../adminViewMembers.php";</script>';
        } else {
            echo "showing";
            $res = $Member->showMember($_GET["id"]);
            echo '<script>location.href="../../adminViewMembers.php";</script>';
        }
    } else {
        echo '<script>location.href="../../forbidden.php";</script>';
    }
}
// return $res;
