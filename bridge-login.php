<?php

try{
    require_once __DIR__."/x.php";
    $userEmail = _validateEmail();
    $userPassword = _validatePassword();
    require_once __DIR__."/db.php";

    $sql = "SELECT * FROM users; WHERE user_email = :email";
    $stmt = $_db->prepare($sql);
    $stmt->bindValue(":email", $userEmail );
    $stmt->execute();
    $user = $stmt->fetch();
    // echo $user; # IMPOSSIBLE Can't do it...
    // var_dump($user);
    // echo "<div>******</div></div>";
    // print_r($user);
    // echo "<div>******</div></div>";
    // echo json_encode($user);
    # Check if the user is in the DB?
    if( ! $user ){
        header("Location: login");
        exit();
    }
    if( ! password_verify($userPassword, $user["user_password"])){
        header("Location: login");
        exit();
    }
    unset($user["user_password"]);
    // var_dump($user);
    session_start();
    $_SESSION["user"] = $user;
    header("Location: profile");
}catch(Exception $e){
    http_response_code( $e->getCode() );
    _($e->getMessage());
    
}