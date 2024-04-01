<?php
class CategoryGuessingController {
   private $obj = array();
   private $randomValues = array();
   private $errorMessage = "";
   private $input;
   private $win = false;
   private $priorGuesses = "";
   private $testingArr = array();
   private $guessCount;

   
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
            case "play-again":
                $this->playAgain();
                break;
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
        $win = $_SESSION["win"];
        $guessCount = $_SESSION["guess_count"];

        $testingArr = $this->guessCategory();
        $guessResult = $testingArr; 

        if (isset($_SESSION["prior_guesses"])) {
            $priorGuesses = implode("\n", $_SESSION["prior_guesses"]);
        } else {
            $priorGuesses = "";
        }

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
       $win = $_SESSION["win"];
       $guessCount = $_SESSION["guess_count"];
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
        if(!isset($_POST["guess"]) || !empty($_POST["guess"])){
            $message = "";
            $guessWordArr = array();
            $guessArr = array();
            $this->randomValues = $_SESSION["random_values"];
            if (isset($_POST["guess"])) {
                $_SESSION["prior_guesses"][] = $_POST["guess"];
                $guessArr = explode(" ", $_POST["guess"]);
                foreach($guessArr as $guessValue) {
                    $guessWordArr[] = $this->randomValues[intval($guessValue)];
                }
            }

            $this->priorGuesses .= implode(" ", $guessArr) . "\n";
            
            $_SESSION["guess_count"]++;


            // print_r($guessArr);
            $guessCat = array();
            for($i=0; $i<4; $i++){
                $currentCat = $this->getCategory($guessWordArr[$i]);
                $guessCat[] = $currentCat;
            }
            // print_r($guessCat);
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
            // print_r($indexes);


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
                // print_r($this->randomValues);
                $_SESSION["random_values"] = $this->randomValues;
            }


            $randomValueGames = array();
            $randomValueGames = $this->randomValues;
            
            
            if(empty($randomValueGames)){
                    $this->win = true;
                $_SESSION["win"] = $this->win;
                header("Location: ?command=game-over");
            }


            // print($indexes);
            // print_r($guessArr);
            // print_r($guessWordArr);
            // print("HELLO");
            // print($this->getCategory($guessWordArr[0]));
            // $obj = $this->obj;
            // print_r($obj);
            
            return $result;
        }
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
           $_SESSION["guess_count"] = 0;
           $this->win = false;
           $_SESSION["win"] = $this->win;
           $_SESSION["name"] = $_POST["name"];
           $_SESSION["email"] = $_POST["email"];
           $this->randomValues = $this->getRandomValues();
           $_SESSION["random_values"] = $this->randomValues;
           header("Location: ?command=game");
           return;
       }


        // $this->errorMessage = "Error logging in - Name and email are required";
        $this->showWelcome();
    }


    public function logout() {
        session_destroy();
        session_start();
    }


    public function playAgain() {
        $_SESSION["guess_count"] = 0;
        $this->win = false;
        $_SESSION["win"] = $this->win;
        $this->randomValues = $this->getRandomValues();
        $_SESSION["random_values"] = $this->randomValues;
        $this->priorGuesses = "";
        $_SESSION["prior_guesses"] = array();
        header("Location: ?command=game");
    }
}