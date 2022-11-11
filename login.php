<?php 
    include_once('header.php');
?>

<form action="functions.php?act=checkLogin" method="post">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" require><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password"><br>
    
    <input type="submit" value="LogIn">
</form>

<form action="functions.php?act=createAccount" method="post">
    <a href="createAccount.php">create new account</a>
</form>

<?php 
    include_once('footer.php');
?>