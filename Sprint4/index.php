<?php
//Sources used:https://stackoverflow.com/questions/4069718/postgres-insert-if-does-not-exist-already,
//https://www.shecodes.io/athena/3469-how-to-display-text-when-a-button-is-clicked-with-javascript,
//https://stackoverflow.com/questions/19605150/regex-for-password-must-contain-at-least-eight-characters-at-least-one-number-a,
//https://cs4640.cs.virginia.edu/homework/homework6.html#other-notes
//https://getbootstrap.com/docs/4.0/components/modal/
//https://www.geeksforgeeks.org/sort-array-dates-php/#
//https://stackoverflow.com/questions/11583822/usort-date-assistance
//https://developer.mozilla.org/en-US/docs/Web/API/Document/DOMContentLoaded_event
//https://stackoverflow.com/questions/39993676/code-inside-domcontentloaded-event-not-working
//
////link to published site for Jacqueline Lainhart (nyt8te): https://cs4640.cs.virginia.edu/nyt8te/Sprint%204/
//link to published site for Angie Loayza (akl5sz): https://cs4640.cs.virginia.edu/akl5sz/Sprint4/
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
$game = new MediacController($_GET);

// Run the controller
$game->run();
?>