<?php 

try{
    require_once __DIR__."/x.php";
    $userFirstName = trim($_POST["user_first_name"]);
    if(strlen($userFirstName) < 2){
        throw new Exception("First name must be at least 2 characters long", 400);
    }
    if(strlen($userFirstName) > 50){
        throw new Exception("First name must be max 50 characters long", 400);
    }

    $userEmail = _validateEmail();
    $userPassword = _validatePassword();
    $hashedPassword = password_hash($userPassword, PASSWORD_DEFAULT);

    function generate_uuid4_nodash(): string {
        $data = random_bytes(16);
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // version 4
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // variant
        return bin2hex($data); // 32 chars, hex only
    }

    $userPk = generate_uuid4_nodash();

    require_once __DIR__."/db.php";
    $sql = "INSERT INTO users (user_pk, user_first_name, user_email, user_password) VALUES (:user_pk, :first_name, :email, :password)";
    $stmt = $_db->prepare( $sql );

    $stmt->bindValue(":user_pk", $userPk);
    $stmt->bindValue(":first_name", $userFirstName);
    $stmt->bindValue(":email", $userEmail);
    $stmt->bindValue(":password", $hashedPassword);

    $stmt->execute();

    header("Location: index");
    exit();
}
catch(Exception $e){
    http_response_code($e->getCode());
    _($e->getMessage());
}