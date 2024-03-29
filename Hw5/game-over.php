<?php
$json = file_get_contents('connections.json');
$obj = json_decode($json, TRUE);  
$randomValues = array();

function getRandomCats(){
    global $obj;
    $randomCats = array();
    for($i = 1; $i <= 4; $i++){
        $key = array_rand($obj);
        $list = $obj[$key];
        shuffle($list);
        if(!array_key_exists($key, $randomValues)){
            for($j=0; $j < 4; $j++){
                $randomValues[$key][] = $list[$j];
            }
        }
        else{
            $i--;
        }
    }
    return $randomValues;
}

function getRandomValues() {
    $randomValues = array();
    $randomCats = getRandomCats();
    print_r($randomCats);
    foreach($randomCats as $randomCat => $values) {
        $randomValues = array_merge($randomValues, $values);
    }
    shuffle($randomValues);
    return $randomValues;
}
print("\n");
print_r(getRandomValues());
