<?php
class MediacController {
   private $obj = array();
   private $randomValues = array();
   private $errorMessage = "";
   private $input;

   private $db;

   public function __construct($input) {
        $this->db = new Database();
       session_start();
       $this->input = $input;
   }


   public function run() {
        $command = "login";
        if (isset($this->input["command"]))
            $command = $this->input["command"];

        //supposedly for when a user get here without going through the welcome page, so we
        // should send them back to the welcome page only.
        // if (!isset($_SESSION["username"]) && ($command != "login-action" || $command != "signup-action"))
            // $command = "login";

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
        $message = "";
        if(!empty($this->errorMessage)){
            $message = "<div class='alert alert-danger'>{$this->errorMessage}</div>";
        }
        include("signup.php");
    }


    public function showLogin() {
        $message = "";
        if(!empty($this->errorMessage)){
            $message = "<div class='alert alert-danger'>{$this->errorMessage}</div>";
        }
        include("login.php");
    }


    public function showFeed(){
        include("feed.php");
    }


    public function signUpAction(){
             if (isset($_POST["username"]) && !empty($_POST["username"]) &&
             isset($_POST["password"]) && !empty($_POST["password"])&&
             isset($_POST["email"]) && !empty($_POST["email"])&&
             isset($_POST["movie"]) && !empty($_POST["movie"])&&
             isset($_POST["tv-show"]) && !empty($_POST["tv-show"])&&
             isset($_POST["music-artist"]) && !empty($_POST["music-artist"])) {
                // $password = $_POST['password']; // Assuming password is submitted via a form POST request
                // if (strlen($password) < 6) {
                //     die("Password must be at least 6 characters long.");
                // }

                // // Hash the password
                // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                // //insert into database $hashedPassword with the session username;


            $_SESSION["username"] = $_POST["username"];
            // $_SESSION["password"] = $_POST["password"];
            // $_SESSION["email"] = $_POST["email"];
            // $_SESSION["movie"] = $_POST["movie"];
            // $_SESSION["tv-show"] = $_POST["tv-show"];
            // $_SESSION["music-artist"] = $_POST["music-artist"];
            header("Location: ?command=feed");
            return;
       } else {
            $this->errorMessage = "All the fields below are required.";
            $this->showSignUp();
        }
    }


    public function loginAction() {
        //validate: make sure the user has submitted the form by checking that all its fields are not null, use isset()
        //also, instantiate all user data like score keeper or something of the sort
        if (isset($_POST["username"]) && isset($_POST["password"]) 
        && !empty($_POST["username"]) && !empty($_POST["password"])) {
            
            $res = $this->db->query("select * from users where username = $1;", $_POST["username"]);
            if (!empty($res)) {
                if (password_verify($_POST["password"], $res[0]["password"])) {
                    $_SESSION["username"] = $res[0]["username"];
                    $_SESSION["email"] = $res[0]["email"];
                    header("Location: ?command=feed");
                    return;
            } else {
                $this->errorMessage = "Username and/or password incorrect.";
                $this->showLogin();
            }
        } else {
            $this->errorMessage = "Name and password are required.";
            $this->showLogin();
            }
        }  
    }


    public function logoutAction() {
        session_destroy();
        session_start();
    }
}