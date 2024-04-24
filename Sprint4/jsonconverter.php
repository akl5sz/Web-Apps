<?php
// Allow Cross-Origin Scripting so that we can develop
// on our local Docker environments
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Authorization, Accept, Client-Security-Token, Accept-Encoding");
header("Access-Control-Max-Age: 1000");
header("Access-Control-Allow-Methods: GET, OPTIONS");

// Let the browser know we're sending back JSON instead of HTML
header("Content-Type: application/json");

// Build the return data structure
$output = [
    "username" => $username,
    $username => []
];

for($i=0;$i<count($friends);$i++){    
    $friendArray = $friends[$i];
    $output[$username][] = [$friendArray["friend_username"],$friendArray["pfp_hyperlink"]];
}

// Print out JSON 
echo json_encode($output, JSON_PRETTY_PRINT); 

