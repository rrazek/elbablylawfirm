<?php
include_once "../../loading.php";
        session_start();
        session_destroy();
        echo '<script>location.href="../../index.php";</script>';
?>