<?php
include_once "../../loading.php";
// echo md5("Selbably");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once '../Model/User.php';
    $user = new User();
    if ($_POST["login"]) {
        echo "here";
        $username = $_POST["username"];
        $password = md5($_POST["password"]);
        // $res = $u->login("Selbably","b4e0a31cd9b4b95f1619564443283213");
        echo "logging";
        $res = $user->login($username, $password);
        var_dump($res);
        if ($res != false) {
            echo "valid";
            session_start();
            $res->setPassword("");
            $_SESSION["user"] = $res;
            echo '<script>location.href="../../adminIndex.php";</script>';

        } else {
            echo "invalid";
            echo '<script>alert("error: اسم المستخدم او الرقم السري خطأ")</script>';
            echo '<script>location.href="../../login.php";</script>';
        }

    } else if ($_POST["addUser"]) {

    } else if ($_POST["logout"]) {
        session_destroy();
    }
    else {
        echo '<script>location.href="../../forbidden.php";</script>';
        }
}
