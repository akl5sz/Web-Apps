<?php
// Allow Cross-Origin Scripting so that we can develop
// on our local Docker environments
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Authorization, Accept, Client-Security-Token, Accept-Encoding");
header("Access-Control-Max-Age: 1000");
header("Access-Control-Allow-Methods: GET, OPTIONS");

// Let the browser know we're sending back JSON instead of HTML
header("Content-Type: application/json");

$output = [
    "hello" => ["bitch", "hoe"]
];

echo json_encode($output, JSON_PRETTY_PRINT); 