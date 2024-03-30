<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
  <meta charset="UTF-8">  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="CS4640 Spring 2024">
  <meta name="description" content="Our Front-Controller Trivia Game">  
  <title>Connections Game!</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"  integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"  crossorigin="anonymous">       
</head>

<body>
    
<div class="container" style="margin-top: 15px;">
        <div class="row">
                <div class="col-xs-12">
                <h1>Connections Game</h1>
                <h2>Welcome <?=$name?>! (<?=$email?>)</h2>
                <h3>Guesses Made: <?=$guessCount?></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                <?=$message?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">

                <div class="card">
                    <!-- <div class="card-header">
                        Question
                    </div> -->
                    <div class="card-body">
                    <table>
                        <tbody>
                            <?php $arrCount = count((array)$randomValues);
                            $count = 0;
                            foreach($randomValues as $key => $value){
                                echo $key ."\t". $value;
                                $count++;
                                if($count === 4){
                                    echo "<br/>";
                                    $count = 0;
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                    </div>
                </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-xs-12">
                <form action="" method="post">
                    <input type="hidden" name="questionid" value="<?=$randomValues[1]?>">
                    <div class="mb-3">
                        <label for="guess" class="form-label">Guess: </label>
                        <input type="text" class="form-control" id="guess" name="guess">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit Answer</button>
                </form>
                </div>
            </div>
            <a href="?command=game-over" class="btn btn-danger">Quit</a>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

