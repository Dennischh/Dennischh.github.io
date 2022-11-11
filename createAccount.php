<?php
    include_once('header.php');
?>

<form action="functions.php?act=createAccount" method="post">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" require><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password"><br>

    <label for="username">Username:</label>
    <input type="username" id="username" name="username"><br>
    
    <input type="submit" value="Create">
</form>

<?php 
    include_once('footer.php');
?>
