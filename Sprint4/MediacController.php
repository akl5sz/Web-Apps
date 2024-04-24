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
            case "add-comment":
                $this->addComment();
                break;
            case "playlists":
                $this->showPlaylists();
                break;
            case "feed":
                $this->showFeed();
                break;
            case "friends":
                $this->showFriends();
                break;
            case "delete":
                $this->deleteAction();
                break;
            case "search":
                $this->searchMedia();
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
            case "json":
                $this->showJSON();
                break;
            case "logout-action":
                $this->logoutAction();
            default:
                $this->showLogin();
                break;
        }
   }


    public function showDiscover(){
        if (isset($_GET['search'])) {
            $res = $this->searchMedia();
            return;
        }
        include("discover.php");
    }


    public function showFriends(){
        $username = $_POST["username"];
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
        $comments = $this->getComments($_SESSION["username"]);
        include("feed.php");
    }

    
    public function showJSON(){
        $username = $_SESSION["username"];
        $friends = $this->getFriends($username);
        // print_r($friends);
        include("jsonconverter.php");
    }
    public function deleteAction() {
        $res = $this->db->query("delete from movie_comments where username = $1 and title = $2 and year = $3 and comment = $4;", $_POST["username"],$_POST["title"],$_POST["year"],$_POST["comment"]);
        header("Location: ?command=feed");
        return;
    }

    public function signUpAction(){
             if (isset($_POST["username"]) && !empty($_POST["username"]) &&
             isset($_POST["password"]) && !empty($_POST["password"])&&
             isset($_POST["email"]) && !empty($_POST["email"])&&
             isset($_POST["name"]) && !empty($_POST["name"])) {
                $res = $this->db->query("select * from users where username = $1;", $_POST["username"]);
                $password_rule = "/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/";
                if (empty($res)) {
                    if(preg_match($password_rule, $_POST["password"])){
                    $this->db->query("insert into users (username, name, email, password) values ($1, $2, $3, $4);",
                        $_POST["username"], $_POST["name"], $_POST["email"],
                        password_hash($_POST["password"], PASSWORD_DEFAULT));
                    $_SESSION["username"] = $_POST["username"];
                    // $this->errorMessage = "YAY.";
                    // $this->showSignUp();
                    header("Location: ?command=feed");
                    return;
                    }else {
                        $this->errorMessage = "Passwords must be at least 8 characters long and contain at least one letter, one number, and one special character.";
                        $this->showSignUp();
                    }
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
            $this->errorMessage = "User does not exist";
            $this->showLogin();
            }
        } else {
            $this->errorMessage = "Name and password are required.";
            $this->showLogin();
        }  
    }
    public function searchMedia() {
        if (isset($_POST["search"]) && !empty($_POST["search"])) {
            $searchQuery = $_POST["search"];
            echo("hi");
            $res = $this->db->query("SELECT * FROM movies WHERE title ILIKE '%$searchQuery%'");
            if ($res !== false) {
                header("Location: ?command=discover");
                return $res; 
            } else {
                $this->errorMessage = "A problem has occurred.";
                $this->showDiscover();
            }
        }
    }


    public function getComments($username) {
        if ($username != null) {
            $comments = $this->db->query("select * from movie_comments where username = $1;",$username);
            return $comments;
        }
    }

    public function addComment() {
        if (isset($_POST["comment"]) && !empty($_POST["comment"]) &&
        isset($_POST["title"]) && !empty($_POST["title"]) &&
        isset($_POST["year"]) && !empty($_POST["year"])) {

            $res = $this->db->query("INSERT INTO movie_comments (username, title, year, comment) VALUES ($1, $2, $3, $4);", 
                $_SESSION["username"], $_POST["title"], $_POST["year"], $_POST["comment"]);

            if ($res !== false) {
                header("Location: ?command=feed");
                return;
            } else {
                $this->errorMessage = "A problem has occured.";
                $this->showFeed();
            }
        } else {
                $this->errorMessage = "Please insert data to all fields.";
                $this->showFeed();
        }
    }
    public function getFriends($username){
        if ($username != null) {
            $friends = $this->db->query("select * from friends where username = $1;", $username);
            return $friends;
        }
    }

    public function logoutAction() {
        session_destroy();
        session_start();
    }
}