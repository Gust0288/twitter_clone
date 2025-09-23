<?php
ini_set("display_errors", 0);
// The database is local to this service
// Get users from the database
// Assositative array
// multim-dimensional array [[],[],[]]
// json_encode converts an object to text
// json_decode converts text into an object
// json_decode takes a second argument to treat data as an assoc array
$users = [
    ["user_pk"=>1, "user_name"=>"A"]
];
echo "<div>".json_encode($users)."</div>";

// $dataFromFile = file_get_contents("data.txt");
// $dataFromFileAsJSON = json_decode($dataFromFile, true);
// echo $dataFromFile;
// echo $dataFromFileAsJSON[0]["post_pk"];
// echo $dataFromFileAsJSON[0]["post_title"];
// echo $dataFromFileAsJSON[0]["post_message"];
// echo $dataFromFile;

$textFromAPI = file_get_contents("https://tech2art.com/api-get-post.php");
$textFromAPIAsObj = json_decode($textFromAPI, true);
echo $textFromAPIAsObj[0]["post_pk"];
echo $textFromAPIAsObj[0]["post_title"];
echo $textFromAPIAsObj[0]["post_message"];

echo "<div>Trending</div>";

