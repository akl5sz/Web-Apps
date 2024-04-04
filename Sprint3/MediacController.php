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
             isset($_POST["name"]) && !empty($_POST["name"])) {
                $res = $this->db->query("select * from users where username = $1;", $_POST["username"]);
                if (empty($res)) {
                    $this->db->query("insert into users (username, name, email, password) values ($1, $2, $3, $4);",
                        $_POST["username"], $_POST["name"], $_POST["email"],
                        password_hash($_POST["password"], PASSWORD_DEFAULT));
                    $_SESSION["username"] = $_POST["username"];
                    // $this->errorMessage = "YAY.";
                    // $this->showSignUp();
                    header("Location: ?command=feed");
                    return;
                } else {
                    $this->errorMessage = "Username already exists.";
                    $this->showSignUp();
                }
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
                $this->errorMessage = "Incorrect username and/or password.";
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