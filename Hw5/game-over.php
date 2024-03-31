<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"  integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"  crossorigin="anonymous">      
</head>
<body>
   <h1>GAME OVER YAY</h1>
   <?php if($win === true){
       echo "<h2> You won in " . $guessCount-1 . " guesses.</h2>";
   }
   ?>
   <a href="?command=play-again" class="btn btn-primary">Play Again?</a>
   <a href="?command=logout" class="btn btn-danger">Exit</a>
</body>
</html>