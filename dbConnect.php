<?php

    $dbConnection = mysqli_connect("127.0.0.1", "root", "", "php_travel");

    if (mysqli_connect_errno()){
        echo "failed".mysqli_connect_error();
        exit();
    }

    mysqli_set_charset($dbConnection, "utf8");
?>