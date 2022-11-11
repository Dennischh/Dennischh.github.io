<?php

    include_once 'dbConnect.php';

    $name = $_REQUEST["name"];
    $email = $_REQUEST["email"];
    $message = $_REQUEST["message"];
    $date = date('Y-m-d H:i:s');

    global $dbConnection;

    $sql = "insert into contact(Name, email, message, time) values('$name', '$email', '$message', '$date')";
    $addContact = mysqli_query($dbConnection, $sql);

    $contactQ = mysqli_query($dbConnection, "select * from `contact`");

?>

<html>
<head>
<title>Contact Us</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
 <div id="content">
        <table align ="center">
        <tr>
        <th>#</th>
        <th>User name</th>
        <th>Email</th>
        <th>Message</th>
        <th>Comment time</th>
        </tr>

<?php
    
    while ($contact = mysqli_fetch_assoc($contactQ)) {

        $infoQ = mysqli_query($dbConnection, 'SELECT * FROM `contact`');
        $info = mysqli_fetch_assoc($infoQ);
        
        printf(
            '<tr>
            <td>%s</td>
            <td>%s</td>
            <td>%s</td>
            <td>%s</td>
            <td>%s</td>
            </tr>',

            $contact["ID"],
            $contact["Name"],
            $contact["email"],
            $contact["message"],
            $contact["time"]
            
        );
    
    }

?>
    </table>
    </div>
</body>
</html>