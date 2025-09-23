<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: Thu, 01 Jan 1970 00:00:00 GMT");
// require_once __DIR__."/x.php";
// _noCache();
session_start();
if( ! isset($_SESSION["user"]) ){
    header("Location: login");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">    

    <title>Document</title>
</head>
<body>
    
    <h1>Profile</h1>

    <div>
        <?php 
        echo $_SESSION["user"]["user_pk"];
        ?>
    </div>

    <div>
        <?php 
        echo $_SESSION["user"]["user_email"];
        ?>
    </div>

    <div>
        <?php 
        echo $_SESSION["user"]["user_first_name"];
        ?>
    </div>    

    <a href="bridge-logout">
        Logout
    </a>

</body>
</html>