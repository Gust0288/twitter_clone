<?php
$one = $_GET["one"];
$two = $_GET["two"];
$three = $_GET["three"];
?>

searching for <?php echo "$one $two $three" ?>


<form action="bridge-search" method="POST">
    <input name="user_name" type="text">
    <button>Search</button>
</form>





