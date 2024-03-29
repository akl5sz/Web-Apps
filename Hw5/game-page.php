<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <table class="table">
        <tbody>
            <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>@mdo</td>
            </tr>
            <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
            <td>@mdo</td>
            </tr>
            <tr>
            <th scope="row">3</th>
            <td colspan="2">Larry the Bird</td>
            <td>@twitter</td>
            <td>@mdo</td>
            </tr>
            <tr>
            <th scope="row">4</th>
            <td colspan="2">Larry the Bird</td>
            <td>@twitter</td>
            <td>@mdo</td>
            </tr>
        </tbody>
    </table>
    <form action="" method="post">
        <input type="hidden" name="" value="">

        <div class="mb-3">
            <label for="answer" class="form-label">Category Guess: </label>
            <input type="text" class="form-control" id="trivia-answer" name="answer">
        </div>

        <button type="submit" class="btn btn-primary">Submit Answer</button>
    </form>
</body>
</html> -->

<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
  <meta charset="UTF-8">  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="CS4640 Spring 2024">
  <meta name="description" content="Our Front-Controller Trivia Game">  
  <title>PHP Form Example - Trivia</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"  integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"  crossorigin="anonymous">       
</head>

<body>
    
<div class="container" style="margin-top: 15px;">
        <div class="row">
                <div class="col-xs-12">
                <h1>Trivia Game</h1>
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
                    <div class="card-header">
                        Question
                    </div>
                    <div class="card-body">
                        <h1><?="HELLO"?></h1>
                        <h5 class="card-title"><?=$randomValues[0]?></h5>
                    </div>
                </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-xs-12">
                <form action="?command=answer" method="post">
                    <input type="hidden" name="questionid" value="<?=$randomValues[1]?>">

                    <div class="mb-3">
                        <label for="answer" class="form-label">Trivia Answer: </label>
                        <input type="text" class="form-control" id="trivia-answer" name="answer">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit Answer</button>
                </form>
                </div>
            </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

