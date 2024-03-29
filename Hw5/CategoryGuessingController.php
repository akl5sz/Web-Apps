<?php
class CategoryGuessingController {
    private $obj = array();
    private $randomValues = array();
    private $errorMessage = "";
    
    public function __construct($input) {
        session_start();
        $this->input = $input;
        $this->loadQuestions();
    }

    public function loadCatAndVals() {
        session_start(); 

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
         if (!isset($_SESSION["name"] || !isset($_SESSION["email"]))
             $command = "welcome";

        switch($command) {
            case "game":
                $this->showGamePage();
                break;
            // case "answer":
            //     $this->answerQuestion();
            //     break;
            default:
                $this->showWelcome();
                break;
        }
    }

    public function showGamePage($message = "") {
        $randomValues = $this->getRandomValues(); // Assign $randomValues to a local variable
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
        $this->randomValues = array();
        $randomCats = getRandomCats();
        foreach ($randomCats as $randomCat => $values) {
            $this->randomValues = array_merge($this->randomValues, $values);
        }
        shuffle($this->randomValues);
        return $this->randomValues;
    }

    public function login() {
        if (isset($_POST["name"]) && isset($_POST["email"]) &&
            !empty($_POST["name"]) && !empty($_POST["email"])) {
            $_SESSION["name"] = $_POST["name"];
            $_SESSION["email"] = $_POST["email"];
            $_SESSION["guessCount"] = 0;
            header("Location: ?command=game");
            return;
        }
        $this->errorMessage = "Error logging in - Name and email is required";
        $this->showWelcome();
    }

    public function logout() {
        session_destroy();
        session_start();
    }
}