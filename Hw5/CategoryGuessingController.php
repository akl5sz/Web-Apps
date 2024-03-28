<?php
class CategoryGuessingController {
    private $json = file_get_contents('connections.json');
    private $obj = json_decode($this->json, TRUE);  
    
    function getRandomCats(){
        $randomCats = array();
    
        for($i = 1; $i <= 4; $i++){
            $key = array_rand($this->obj);
            $randomCats[] = $key;
        }
        return $randomCats;
    }
}
