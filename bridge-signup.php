<?php

$password = $_POST["password"];
echo $password;

$hashed_password = password_hash($password, PASSWORD_DEFAULT);
echo $hashed_password;

$password = "something new";

if( password_verify($password, $hashed_password) ){
    echo "You are logged in";
}else{
    echo "Wrong password";
}








