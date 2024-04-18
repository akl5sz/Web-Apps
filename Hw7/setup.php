<?php
// Allow Cross-Origin Scripting so that we can develop
// on our local Docker environments
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Authorization, Accept, Client-Security-Token, Accept-Encoding");
header("Access-Control-Max-Age: 1000");
header("Access-Control-Allow-Methods: GET, OPTIONS");

// Let the browser know we're sending back JSON instead of HTML
header("Content-Type: application/json");

$input = $_GET['input'];

if ($input < 1) {
    $json = [
        'notPositive' => 'Please insert a value greater than 0.'
    ];
} else {
    $numberOfBoxes = $input * $input;
    $lightsOn = array();

    if ($numberOfBoxes <= 10) {
        for ($i = 0; $i < $input; $i++) {
            for ($j = 0; $j < $input; $j++) {
                $lightsOn[] = array('row' => $i, 'column' => $j);
            }
        }
    } else {
        $lightsOff = array();
        for ($i = 0; $i < $input; $i++) {
            for ($j = 0; $j < $input; $j++) {
                $lightsOff[] = array('row' => $i, 'column' => $j);
            }
        }

        $randomBoxes = array_rand($lightsOff, 10);
        for($i = 0; $i < count((array)$randomBoxes); $i++){
            $lightsOn[] = $randomBoxes[$i];
        }
    }
        $json = array('lightsOn' => $lightsOn);
}

echo json_encode($json, JSON_PRETTY_PRINT); 