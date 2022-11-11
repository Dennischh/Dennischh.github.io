<?php
    session_start();
    include_once 'dbConnect.php';
    $act ='none';
    if(isset($_GET['act'])) $act = $_GET['act'];
    if(isset($_GET['n'])) $getName = $_GET['n'];

    if($act=='createAccount')
    {
        createAccount($_POST['email'],$_POST['password'],$_POST['username']);
    }
    if($act=='checkLogin')
    {
        checkLogin($_POST['email'],$_POST['password']);
    }
    if($act=='logout')
    {
        logout();
    }
    if($act=='openEye')
    {
        if($_SESSION){

            $checkRecordQ = mysqli_query($dbConnection, "
            SELECT `favouriteID`, b.`spotID`, `view` FROM `php_travel`.`favorite` AS a
            JOIN hotspot AS b
            ON a.spotID = b.spotID
            JOIN login AS c
            ON a.userID = c.id
            where b.`spotID` = '".$getName."' and `email` = '".$_SESSION['email']."' ");
            $checkRecord = mysqli_fetch_assoc($checkRecordQ);

            if ($checkRecord){
                $updateQ = "update `favorite` set view = '1' where `favouriteID` = {$checkRecord['favouriteID']}";
                $updateViewQ = mysqli_query($dbConnection, $updateQ);
            }
            else{
                $insertQ = "insert into `favorite` (userID, spotID, view, favourite) values ('{$_SESSION['id']}', '{$getName}', '1', '0')";
                $insertViewQ = mysqli_query($dbConnection, $insertQ);
            }
        }
    }

    if($act=='closeEye')
    {
        if($_SESSION){

            $checkRecordQ = mysqli_query($dbConnection, "
            SELECT `favouriteID`, b.`spotID`, `view` FROM `php_travel`.`favorite` AS a
            JOIN hotspot AS b
            ON a.spotID = b.spotID
            JOIN login AS c
            ON a.userID = c.id
            where b.`spotID` = '".$getName."' and `email` = '".$_SESSION['email']."' ");
            $checkRecord = mysqli_fetch_assoc($checkRecordQ);

            if ($checkRecord){
                $updateQ = "update `favorite` set view = '0' where `favouriteID` = {$checkRecord['favouriteID']}";
                $updateViewQ = mysqli_query($dbConnection, $updateQ);
            }
            else{
                $insertQ = "insert into `favorite` (userID, spotID, view, favourite) values ('{$_SESSION['id']}', '{$getName}', '0', '0')";
                $insertViewQ = mysqli_query($dbConnection, $insertQ);
            }
        }
    }

    if($act=='fillHeart')
    {
        if($_SESSION){

            $checkRecordQ = mysqli_query($dbConnection, "
            SELECT `favouriteID`, b.`spotID`, `favourite` FROM `php_travel`.`favorite` AS a
            JOIN hotspot AS b
            ON a.spotID = b.spotID
            JOIN login AS c
            ON a.userID = c.id
            where b.`spotID` = '".$getName."' and `email` = '".$_SESSION['email']."' ");
            $checkRecord = mysqli_fetch_assoc($checkRecordQ);

            if ($checkRecord){
                $updateQ = "update `favorite` set favourite = '1' where `favouriteID` = {$checkRecord['favouriteID']}";
                $updateFavoriteQ = mysqli_query($dbConnection, $updateQ);
            }
            else{
                $insertQ = "insert into `favorite` (userID, spotID, view, favourite) values ('{$_SESSION['id']}', '{$getName}', '0', '1')";
                $insertFavoriteQ = mysqli_query($dbConnection, $insertQ);
            }
        }
    }

    if($act=='emptyHeart')
    {
        if($_SESSION){

            $checkRecordQ = mysqli_query($dbConnection, "
            SELECT `favouriteID`, b.`spotID`, `favourite` FROM `php_travel`.`favorite` AS a
            JOIN hotspot AS b
            ON a.spotID = b.spotID
            JOIN login AS c
            ON a.userID = c.id
            where b.`spotID` = '".$getName."' and `email` = '".$_SESSION['email']."' ");
            $checkRecord = mysqli_fetch_assoc($checkRecordQ);

            if ($checkRecord){
                $updateQ = "update `favorite` set favourite = '0' where `favouriteID` = {$checkRecord['favouriteID']}";
                $updateViewQ = mysqli_query($dbConnection, $updateQ);
            }
            else{
                $insertQ = "insert into `favorite` (userID, spotID, view, favourite) values ('{$_SESSION['id']}', '{$getName}', '0', '0')";
                $insertViewQ = mysqli_query($dbConnection, $insertQ);
            }
        }
    }

    function createAccount($email, $password, $name){
        global $dbConnection;
        $checkEmailQ = mysqli_query($dbConnection, "select * from `login` where `email` = '".$email."'");
        $checkEmail = mysqli_fetch_assoc($checkEmailQ);

        if ($checkEmail){
            echo('<a href="createAccount.php">Email Invalid. Please create again.</a>');
        }
        else{
            $insertQ = "insert into `login` (email, password, name) values ('$email', '$password', '$name')";
            $newAccountQ = mysqli_query($dbConnection, $insertQ);
            echo('<a href="login.php">Success. Click to login.</a>');
        }
    }

    function checkLogin($email, $password){

        global $dbConnection;
        $memberQ = mysqli_query($dbConnection, "select * from `login` where `email` = '".$email."'");
        $member = mysqli_fetch_assoc($memberQ);

        if ($email == $member['email'] && $password == $member['password']){
            session_start();
            $_SESSION['id'] = $member['id'];
            $_SESSION['email'] = $email;
            header("Location: /2/groupproject.php");
        }
        else{
            header("Location: /2/login.php");
        }
    }

    function logout(){
        session_start();
        session_destroy();
        header("Location: /2/groupproject.php");
    }

?>