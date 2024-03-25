<?php
session_start();
switch (@parse_url($_SERVER['REQUEST_URI'])['path']) {
   case '/': // URL (without file name) to a default screen
      require 'welcome-page.php';
      break; 
   case '/welcome-page.php':
      require 'welcome-page.php';
      break;
   case '/game-page.php':    
      require 'game-page.php';
      break;              
   case '/game-over.php':
      require 'game-over.php';
      break;
   default:
      http_response_code(404);
      exit('Not Found');
}  
?>