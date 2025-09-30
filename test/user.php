<?php

class User {
    private $username;
    private $userFirstname; // Make sure this matches everywhere

    public function __construct($username, $userFirstname){
        $this->username = $username;
        $this->userFirstname = $userFirstname; // Fixed: was $userfirstName
    }
    
    // getters
    public function getUsername(){
        return $this->username;
    }
    
    public function getFirstName(){
        return $this->userFirstname; // Fixed: was $userFirstName
    }

    public function setUsername($username){ 
        $this->username = $username;


    }

    public function  coonectToDatabase(){
        require_once __DIR__."/db.php";  
        $sql = "INSERT INTO people VALUES(:person_pk, :person_username, :person_first_name)";
        $stmt = $_db->prepare($sql);
        $stmt->bindValue(":person_pk", null);
        $stmt->bindValue(":person_username", $this->username);
        $stmt->bindValue(":person_first_name", $this->userFirstname);
        $stmt->execute();
        return true;
    }
}

// instantiate the object (convert the code into an object into memory)
$formUsername = $_POST["user_name"] ?? "";
$formFirstName = $_POST["user_first_name"] ?? "";

$user = new User($formUsername, $formFirstName);
echo $user->getUsername();
$user->coonectToDatabase();


// $user->setUsername("santi");

// echo $user->getUsername();