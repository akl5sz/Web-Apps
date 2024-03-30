<?php
class CategoryGuessingController {
    private $obj = array();
    private $randomValues = array();
    
    private $errorMessage = "";

    private $input;
    
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
 
         // If the session doesn't have the key "name", then they
         // got here without going through the welcome page, so we
         // should send them back to the welcome page only.
        //  if (!isset($_SESSION["name"]) || !isset($_SESSION["email"]))
        //      $command = "welcome";

        switch($command) {
            case "game":
                $this->showGamePage();
                break;
            // case "answer":
            //     $this->answerQuestion();
            //     break;
            case "login":
                $this->login();
                break;
            default:
                $this->showWelcome();
                break;
        }
    }

    public function showGamePage($message = "") {
        $name = $_SESSION["name"];
        $email = $_SESSION["email"];
        // $score = $_SESSION["score"];
        if(isset($_SESSION["random_values"])) {
            $randomValues = $_SESSION["random_values"];
        } 
        else {
            $randomValues = $this->getRandomValues();
            $_SESSION["random_values"] = $randomValues;
        }
        include("game-page.php");
    }

    public function showWelcome() {
        include("welcome-page.php");
    }

    function getRandomCats(){
        $randomCats = array();
        for ($i = 1; $i <= 4; $i++) {
            $key = array_rand($this->obj);
            $list = $this->obj[$key];
            shuffle($list);
            if (!array_key_exists($key, $this->randomValues)) {
                for ($j = 0; $j < 4; $j++) {
                    $this->randomValues[$key][] = $list[$j];
                }
            } else {
                $i--;
            }
        }
        return $this->randomValues;
    }

    function getRandomValues(){
    $randomValues = array();
    $randomCats = $this->getRandomCats();
    foreach ($randomCats as $randomCat => $values) {
        if(is_array($values)) {
            $randomValues = array_merge($randomValues, $values);
        }
        if(!is_array($values)) {
            $randomValues = array_merge($randomValues, explode("",$values));
        }

    }
    shuffle($randomValues);

    return $randomValues;
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
    }
}