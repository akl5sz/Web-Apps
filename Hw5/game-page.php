<?php 
// $json = file_get_contents('https://cs4640.cs.virginia.edu/homework/connections.json');
// $obj = json_decode($json);
// print_r($obj);

$obj = array(
    "Movies" => array(
        "Fun",
        "comedy",
        "intertaining",
        "long",
        "chill",
        "friends"
    ),
    "Elden Ring" => array(
        "Tarnished",
        "Malenia",
        "Margit",
        "Grafted",
        "The Lands Between",
        "Grace"
    ),
    "Pokemon" => array(
        "Pikachu",
        "Charizard",
        "Bulbasaur",
        "Geodude",
        "Eevee",
        "Zubat"
    ),
    "Soup Ingredients" => array(
        "Celery",
        "Carrots",
        "Veggie Stock",
        "Onions",
        "Tomatoes",
        "Chicken Stock"
    ),
    "Cooking" => array(
        "chef",
        "knife",
        "range",
        "plate",
        "taste",
        "fire"
    ),
    "Sailing" => array(
        "Water",
        "Wind",
        "Rope",
        "Boat",
        "Sky",
        "Sun"
    ),
    "UVA CS Professors" => array(
        "Hott",
        "Basit",
        "Morrison",
        "Stone",
        "Horton",
        "Nguyen"
    ),
    "Climate Change" => array(
        "Polar Bears",
        "Antarctica",
        "Sea Level",
        "Earth",
        "Nature",
        "Heat"
    ),
    "Classical Music" => array(
        "Music",
        "Songs",
        "Composition",
        "Broadway",
        "Opera",
        "Chopin"
    ),
    "Muppets" => array(
        "Kermit",
        "Miss Piggy",
        "Fozzie Bear",
        "Gonzo",
        "Beaker",
        "Swedish Chef"
    ),
    "Tennis" => array(
        "Forehand",
        "Backhand",
        "Serve",
        "Game",
        "Set",
        "Match"
    ),
    "Souls-like video games!" => array(
        "Dark",
        "soul",
        "cinder",
        "elden",
        "ring",
        "lies"
    ),
    "the history of tea" => array(
        "tea",
        "britain",
        "green",
        "earl grey",
        "trade",
        "tea leaves"
    ),
    "Formula 1 Racing" => array(
        "speed",
        "engineering",
        "aerodynamics",
        "skill",
        "intense",
        "electrifying"
    ),
    "Pineapple" => array(
        "Sweet",
        "Fingerprint",
        "Spiky",
        "Leaves",
        "Juice",
        "Piña Colada"
    ),
    "running" => array(
        "shoes",
        "miles",
        "strava",
        "pace",
        "water",
        "stretching"
    ),
    "Eurovision" => array(
        "song",
        "contest",
        "voting",
        "Europe",
        "jury",
        "public"
    ),
    "Dungeons and Dragons" => array(
        "D20",
        "bard",
        "adventure",
        "dragons",
        "dungeons",
        "dice"
    ),
    "UVA basketball" => array(
        "Defense",
        "JPJ",
        "Bennett",
        "Excitement",
        "Intense",
        "Loud"
    ),
    "Baking" => array(
        "Cookies",
        "Cakes",
        "Bread",
        "Sugar",
        "Butter",
        "Flour"
    )
);

//print_r($obj);

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