<?php

function _($text){
    echo htmlspecialchars($text);

}

define("emailMin", 6);
define("emailMax", 50);
function _validateEmail(){

    $userEmail = $_POST["user_email"];
    if(strlen($userEmail) < emailMin){
        throw new Exception("Email must be at least ".emailMin." characters long", 400);
    }
    if(strlen($userEmail) > emailMax){
        throw new Exception("Email must be max ".emailMax." characters long", 400);
    }
    return $userEmail;


}


define("passwordMin", 6);
define("passwordMax", 50);
function _validatePassword(){

    $userPassword = trim($_POST["user_password"]);
    if(strlen($userPassword) < passwordMin){
        throw new Exception("Password must be at least ".passwordMin." characters long", 400);
    }
    if(strlen($userPassword) > passwordMax){
        throw new Exception("Password must be max ".passwordMax." characters long", 400);
    }
    return $userPassword;


}



function _noCache(){
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Pragma: no-cache");
    header("Expires: 0");
    header('Clear-Site-Data: "cache", "cookies", "storage", "executionContexts"');
}