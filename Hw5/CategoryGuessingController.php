<?php
// class CategoryGuessingController {
//     private $json = file_get_contents('connections.json');
//     private $obj = json_decode($this->json, TRUE);  
//     private $randomValues = array();
    
//     function getRandomCats(){
//         $randomCats = array();
//         for($i = 1; $i <= 4; $i++){
//             $key = array_rand($this->obj);
//             $list = $this->obj[$key];
//             shuffle($list);
//             if(!array_key_exists($key, $randomValues)){
//                 for($j=0; $j < 4; $j++){
//                     $randomValues[$key][] = $list[$j];
//                 }
//             }
//             else{
//                 $i--;
//             }
//         }
//         return $randomValues;
//     }

//     function getRandomValues() {
//         $randomValues = array();
//         $randomCats = $this->getRandomCats();
//         foreach($randomCats as $randomCat => $value) {
//             $randomValues = array_merge($randomValues, $value);
//         }
//         $randomValues = shuffle($randomValues);
//         return $randomValues;
//     }
// }


