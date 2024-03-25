<?php 
$json = file_get_contents('connections.json');
$obj = json_decode($json);
print_r($obj);

print_r(getRandomCats());

function getRandomCats(){
    global $obj;
    $randomCats = array();
    for($i = 1; $i <= 4; $i++){
        $key = array_rand($obj);
        $randomCats[] = $key;
    }
    return $randomCats;
}
?>