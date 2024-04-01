<?php
class MediacController {
   private $obj = array();
   private $randomValues = array();
   private $errorMessage = "";
   private $input;

   public function __construct($input) {
       session_start();
       $this->input = $input;
    //    $this->loadCatAndVals();
   }


   public function loadCatAndVals() {
    //    $this->obj = json_decode(
    //        file_get_contents('/var/www/html/homework/connections.json'), true);

    //    if (empty($this->obj)) {
    //        die("Something went wrong loading categories and values.");
    //    }
   }


   public function run() {
        $command = "welcome";
        if (isset($this->input["command"]))
            $command = $this->input["command"];

        switch($command) {
            case "playlists":
                $this->showPlaylists();
                break;
            case "feed":
                $this->showFeed();
                break;
            case "friends":
                $this->showFriends();
                break;
            case "discover":
                $this->showDiscover();
                break;
            case "signup":
                $this->showSignUp();
                break;
            case "signup-action":
                $this->signUpAction();
                break;
            case "login-action":
                $this->loginAction();
                break;
            case "logout-action":
                $this->logoutAction();
            default:
                $this->showLogin();
                break;
        }
   }

    public function showDiscover(){
        include("discover.php");
    }

    public function showFriends(){
        include("friends.php");
    }
    public function showPlaylists(){
        include("playlists.php");
    }
    public function showSignUp($message = "") {
        include("signup.php");
    }

    public function showLogin() {
        include("login.php");
    }

    public function showFeed(){
        include("feed.php");
    }

    public function signUpAction(){
         //     if (isset($_POST["name"]) && isset($_POST["email"]) &&
    //        !empty($_POST["name"]) && !empty($_POST["email"])) {
    //        $_SESSION["name"] = $_POST["name"];
    //        $_SESSION["email"] = $_POST["email"];
    //        header("Location: ?command=feed");
    //        return;
    //    } else {
    //         $this->errorMessage = "Email is required.";
    //     }

        include("feed.php");
    }

    public function loginAction() {
    //     if (isset($_POST["name"]) && isset($_POST["email"]) &&
    //        !empty($_POST["name"]) && !empty($_POST["email"])) {
    //        $_SESSION["name"] = $_POST["name"];
    //        $_SESSION["email"] = $_POST["email"];
    //        header("Location: ?command=feed");
    //        return;
    //    } else {
    //         $this->errorMessage = "Email is required.";
    //     }
        $this->showFeed();
    }


    public function logoutAction() {
        session_destroy();
        session_start();
    }
}