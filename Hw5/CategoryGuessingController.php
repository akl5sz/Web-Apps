<?php
class CategoryGuessingController {
    private $json = file_get_contents('connections.json');
    private $obj = json_decode($this->json, TRUE);  
    
    function getRandomCats(){
        global $obj;
        $randomCats = array();
        $randomValues = array();
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
}
