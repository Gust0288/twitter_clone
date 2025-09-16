<?php
require_once __DIR__."/x.php";
_noCache();
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h1>Profile</h1>

    <div>
        <?php 
        echo $_SESSION["user"]["user_pk"];
        echo "<div>******</div>";
        echo $_SESSION["user"]["user_email"];
        echo "<div>******</div>";                
        echo $_SESSION["user"]["user_first_name"];
        ?>
    </div>

    <a href="bridge-logout">
        Logout
    </a>

</body>
</html>