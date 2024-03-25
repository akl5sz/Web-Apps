<?php 

error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', '1');

$json = file_get_contents('connections.json');
$obj = json_decode($json, TRUE);  //used TRUE to convert json object into array
//print_r($obj);

print_r(getRandomCats($obj));

function getRandomCats($obj){
    //global $obj;
    $randomCats = array();
    for($i = 1; $i <= 4; $i++){
        $key = array_rand($obj);
        $randomCats[] = $key;
    }
    return $randomCats;
}
?>