<?php
// LINK: https://cs4640.cs.virginia.edu/akl5sz/hw5/?command=logout

// Sources used: 
//https://cs4640.cs.virginia.edu,
//https://stackoverflow.com/questions/10258345/php-simple-foreach-loop-with-html
//https://stackoverflow.com/questions/369602/deleting-an-element-from-an-array-in-php
//https://stackoverflow.com/questions/37404583/php-guessing-number
//https://www.w3schools.com/tags/tag_pre.asp
//
//link to published site for Jacqueline Lainhart (nyt8te): https://cs4640.cs.virginia.edu/nyt8te/hw5/
//link to published site for Angie Loayza (akl5sz): https://cs4640.cs.virginia.edu/akl5sz/hw5/
//
// DEBUGGING ONLY! Show all errors.
// error_reporting(E_ALL);
// ini_set("display_errors", 1);

// Class autoloading by name.  All our classes will be in a directory
// that Apache does not serve publicly.  They will be in /opt/src/, which
// is our src/ directory in Docker.
spl_autoload_register(function ($classname) {
        include "$classname.php";
});

// Other global things that we need to do
// (such as starting a session, coming soon!)

// Instantiate the front controller
$game = new CategoryGuessingController($_GET);

// Run the controller
$game->run();
?>