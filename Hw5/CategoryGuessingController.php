<?php
class CategoryGuessingController {
    private $obj = array();
    private $randomValues = array();
    
    private $errorMessage = "";

    private $input;
    
    private $testingArr = array();
    private $testWord;
    public function __construct($input) {
        session_start();
        $this->input = $input;
        $this->loadCatAndVals();
    }

    public function loadCatAndVals() {
        $this->obj = json_decode(
            file_get_contents('connections.json'), true);

        if (empty($this->obj)) {
            die("Something went wrong loading categories and values.");
        }
    }

    public function run() {
         // Get the command
         $command = "welcome";
         if (isset($this->input["command"]))
             $command = $this->input["command"];

        switch($command) {
            case "game":
                $this->showGamePage();
                break;
            case "game-over":
                $this->gameOver();
                break;
            case "login":
                $this->login();
                break;
            case "logout":
                $this->logout();
            default:
                $this->showWelcome();
                break;
        }
    }

    public function showGamePage($message = "") {
        $name = $_SESSION["name"];
        $email = $_SESSION["email"];
        // $score = $_SESSION["score"];
        $testingArr = $this->guessCategory();
        if(isset($_SESSION["random_values"])) {
            if(empty($_SESSION["random_values"])){
                $randomValues = $this->getRandomValues();
            }
            $randomValues = $_SESSION["random_values"];
        } 
        else {
            $randomValues = $this->getRandomValues();
            $_SESSION["random_values"] = $randomValues;
        }
        include("game-page.php");
    }

    public function gameOver() {
        include("game-over.php");
    }

    public function showWelcome() {
        include("welcome-page.php");
    }

    public function getRandomCats(){
        $randomCats = array();
        for ($i = 1; $i <= 4; $i++) {
            $key = array_rand($this->obj);
            $list = $this->obj[$key];
            shuffle($list);
            if (!array_key_exists($key, $randomCats)) {
                for ($j = 0; $j < 4; $j++) {
                    $randomCats[$key][] = $list[$j];
                }
            } else {
                $i--;
            }
        }
        return $randomCats;
    }

    public function getRandomValues(){
        $randomCats = $this->getRandomCats();
        foreach ($randomCats as $catsArray) {
            if(is_array($catsArray)) {
                $this->randomValues = array_merge($this->randomValues, $catsArray);
            } else {
                $this->randomValues = array_merge($this->randomValues, explode("",$catsArray));
            }
        }
        shuffle($this->randomValues);
        return $this->randomValues;
    }

    public function guessCategory() {
        $message = "";
        $guessWordArr = array();
        $guessArr = array();
        $this->randomValues = $_SESSION["random_values"];
        if (isset($_POST["guess"])) {
            $guessArr = explode(" ", $_POST["guess"]);
            foreach($guessArr as $guessValue) {
                $guessWordArr[] = $this->randomValues[intval($guessValue)];
            }
        }
        print_r($guessArr);
        $guessCat = array();
        for($i=0; $i<4; $i++){
            $currentCat = $this->getCategory($guessWordArr[$i]);
            $guessCat[] = $currentCat;
        }
        print_r($guessCat);
        $indexes = array();
        $guessCatCount = count((array)$guessCat); //to avoid fatal error
        for($i=0;$i<$guessCatCount;$i++){
            for($j=$i+1;$j<count($guessCat);$j++){
                if($guessCat[$i]===$guessCat[$j]){
                    $indexes[] = $i;
                    $indexes[] = $j;
                }
            }
        }
        $indexes = array_unique($indexes);
        print_r($indexes);

        if(!empty($indexes)){
            $result = 4 - count((array)$indexes);
        }
        else{
            $result = 4;
        }
        
        if($result === 0){
            $guessArr;
            for($i=0;$i<4;$i++){
                unset($this->randomValues[$guessArr[$i]]);
            }
            print_r($this->randomValues);
            $_SESSION["random_values"] = $this->randomValues;
        }

        $randomValueGames = array();
        $randomValueGames = $this->randomValues;
        
        
        if(empty($randomValueGames)){
            header("Location: ?command=game-over");
        }

        // print($indexes);
        // print_r($guessArr);
        // print_r($guessWordArr);
        // print("HELLO");
        // print($this->getCategory($guessWordArr[0]));
        // $obj = $this->obj;
        // print_r($obj);
        
        return $guessArr;
    }

    public function getCategory($word) {
        $obj = $this->obj;
        foreach($obj as $key => $value){
            foreach($value as $eachCatWord){
                if($eachCatWord === $word){
                    return $key;
                }
            }
        }
    }

    public function login() {
        if (isset($_POST["name"]) && isset($_POST["email"]) &&
            !empty($_POST["name"]) && !empty($_POST["email"])) {
            $_SESSION["name"] = $_POST["name"];
            $_SESSION["email"] = $_POST["email"];
            // $_SESSION["score"] = 0;
            header("Location: ?command=game");
            return;
        }
        // print("HIDSJND");
        // header("Location: ?command=game");

        // $this->errorMessage = "Error logging in - Name and email are required";
        $this->showWelcome();
    }

    public function logout() {
        session_destroy();
        session_start();
        $this->randomValues = $this->getRandomValues();
        $_SESSION["random_values"] = $this->randomValues;
    }
}