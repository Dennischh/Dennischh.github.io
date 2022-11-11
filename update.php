<?php

    include_once 'dbConnect.php';

    global $dbConnection;

    if(isset($_GET['act'])) $act = $_GET['act'];
    if(isset($_GET['n'])) $getName = $_GET['n'];

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
                $insertQ = "insert into `favorite` (userID, spotID, view, favourite) values ('{$_SESSION['id']}', '{$checkRecord['spotID']}', '1', '0')";
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
                $insertQ = "insert into `favorite` (userID, spotID, view, favourite) values ('{$_SESSION['id']}', '{$checkRecord['spotID']}', '0', '0')";
                $insertViewQ = mysqli_query($dbConnection, $insertQ);
            }
        }
    }

    if($act=='fillHeart')
    {
        if($_SESSION){

            $checkRecordQ = mysqli_query($dbConnection, "
            SELECT `favouriteID`, b.`spotID`, `favorite` FROM `php_travel`.`favorite` AS a
            JOIN hotspot AS b
            ON a.spotID = b.spotID
            JOIN login AS c
            ON a.userID = c.id
            where b.`spotID` = '".$getName."' and `email` = '".$_SESSION['email']."' ");
            $checkRecord = mysqli_fetch_assoc($checkRecordQ);

            if ($checkRecord){
                $updateQ = "update `favorite` set favourite = '1' where `favouriteID` = {$checkRecord['favouriteID']}";
                $updateViewQ = mysqli_query($dbConnection, $updateQ);
            }
            else{
                $insertQ = "insert into `favorite` (userID, spotID, view, favourite) values ('{$_SESSION['id']}', '{$checkRecord['spotID']}', '0', '1')";
                $insertViewQ = mysqli_query($dbConnection, $insertQ);
            }
        }
    }

    if($act=='emptyHeart')
    {
        if($_SESSION){

            $checkRecordQ = mysqli_query($dbConnection, "
            SELECT `favouriteID`, b.`spotID`, `favorite` FROM `php_travel`.`favorite` AS a
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
                $insertQ = "insert into `favorite` (userID, spotID, view, favourite) values ('{$_SESSION['id']}', '{$checkRecord['spotID']}', '0', '0')";
                $insertViewQ = mysqli_query($dbConnection, $insertQ);
            }
        }
    }

?>