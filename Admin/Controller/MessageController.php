<?php
include_once "../../loading.php";
// Define variables and initialize with empty values
$title = $phone = $email = $type = $content = "";
$title_err = $phone_err = $email_err = $type_err = $content_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once '../Model/Message.php';
    $message = new Message();
    if ($_POST["addMessage"]) {
        echo "Adding...";

        // Validate name
        $input_title = trim($_POST["title"]);
        if (empty($input_title)) {
            $title_err = "قم بإضافة الاسم.";
        } else {
            $title = $input_title;
        }
        $input_phone = trim($_POST["phone"]);
        if (empty($input_phone)) {
            $title_phone = "قم بإضافة رقم التليفون.";
        } else {
            $phone = $input_phone;
        }
        $input_email = trim($_POST["email"]);
        if (empty($input_email)) {
            $title_email = "قم بإضافة البريد الإلكتروني.";
        } else {
            $email = $input_email;
        }

        // Validate address
        $cat_content = trim($_POST["content"]);
        if ($cat_content == "null") {
            $cat_err = "برجاء ادخال التفاصيل ";
        } else {
            $content = $cat_content;
        }

        // Validate salary
        $input_type = trim($_POST["type"]);
        if (empty($input_type)) {
            $content_desc = "برجاء ادخال نوع القضية";
        } else {
            $type = $input_type;
        }

        echo "<br>";
        // Check input errors before inserting in database
        if (empty($title_err) && empty($content_err) && empty($phone_err) && empty($email_err) && empty($type_err)) {
            // Check if $uploadOk is set to 0 by an error

            //step 1 : Get The data from the inputs
            $message->setName($title);
            $message->setType($type);
            $message->setContent($content);
            $message->setPhone($phone);
            $message->setEmail($email);

            //step 2 , 3 & 4:
            $result = $message->addMessage($message);

            if ($result == true) {
                echo '<script>alert("Added ")</script>';
                echo '<script>location.href="../../index.php";</script>';
                // echo '<script>location.href="../../index.php";</script>';
            } else {
                echo '<script>alert("error: message not added")</script>';
                echo '<script>location.href="../../adminViewMessages.php";</script>';
                // echo '<script>location.href="../../index.php";</script>';
            }

        }
    }

    else if ($_POST["deleteMessage"]) {
        if (isset($_POST["id"]) && !empty($_POST["id"])) {
            // Include config file
            $result = $message->removeMessage($_POST["id"]);

            if ($result == true) {
                echo '<script>alert("Deleted ")</script>';
                echo '<script>location.href="../../adminViewMessages.php";</script>';

                //echo '<script>location.href="../welcome.php";</script>';
            } else {
                echo '<script>alert("error: Message not found")</script>';
                echo '<script>location.href="../../adminViewMessages.php";</script>';

                //echo '<script>location.href="../index.html";</script>';
            }

        } else {
            // Check existence of id parameter
            if (empty(trim($_GET["id"]))) {
                // URL doesn't contain id parameter. Redirect to error page
                // header("location: error.php");
                echo '<script>alert("error: select ID")</script>';
                echo '<script>location.href="../../adminViewMessages.php";</script>';

            }
        }
    }

} else {
    if ($_GET["id"]) {

// include_once "../View/ArticleView.php";
        include_once "../Model/Message.php";

        $message = new Message();
        if ($_GET["state"] == 1) {
            echo "changing to unseen";
            $res = $message->unseenMessage($_GET["id"]);
            echo '<script>location.href="../../adminViewMessages.php";</script>';

        } else {
            echo "changing to seen";
            $res = $message->seenMessage($_GET["id"]);
            echo '<script>location.href="../../adminViewMessages.php";</script>';

        }
    } else {
        echo '<script>location.href="../../forbidden.php";</script>';
    }
}
// return $res;
