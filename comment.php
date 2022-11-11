<?php  
    $local = "localhost";
    $dbname = "groupd_db";
    $username = "user";
    $password = "password";

    $name = $_REQUEST["name"];
    $email = $_REQUEST["email"];
    $message = $_REQUEST["message"];
    $date = date('Y-m-d H:i:s');

    // creat new connection
    $connect = new mysqli($local, $username, $password, $dbname);

    // check connection with db
    if($connect === false){
        die("ERROR: Could not connect. " 
            . mysqli_connect_error());
    }
    // assign values captured from website into database 
    $sql = "insert into contactus(User_name, Email, Message, Time) values('$name', '$email', '$message', '$date')";

    // execute sql statement
    mysqli_query($connect,$sql);

    // close connection with database
    // mysqli_close($connect); 
    ?>

<?php
$sql_query="SELECT * FROM contactus";
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
    
    $result = mysqli_query($connect, $sql_query);

    if ($result != null) {
        $row = $result->fetch_assoc();
        $num_row = mysqli_num_rows($result);
        }
    // row = a column of info captured

    if ($result != null) {
        
        while ($row = $result->fetch_assoc()) {
          $row[] = $row;
          printf(
            '<tr>
            <td>%s</td>
            <td>%s</td>
            <td>%s</td>
            <td>%s</td>
            <td>%s</td>
            </tr>',

            $row["ID"],
            $row["User_name"],
            $row["Email"],
            $row["Message"],
            $row["Time"]
            
          );
        }
      }

?>
    </table>
    </div>
</body>
</html>