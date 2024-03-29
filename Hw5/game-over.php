<?php

// $json = file_get_contents('connections.json');
// $obj = json_decode($json, true);
// $randomValues = array();

// function getRandomCats()
// {
//     global $obj, $randomValues;
//     $randomCats = array();
//     for ($i = 1; $i <= 4; $i++) {
//         $key = array_rand($obj);
//         $list = $obj[$key];
//         shuffle($list);
//         if (!array_key_exists($key, $randomValues)) {
//             for ($j = 0; $j < 4; $j++) {
//                 $randomValues[$key][] = $list[$j];
//             }
//         } else {
//             $i--;
//         }
//     }
//     return $randomValues;
// }

// function getRandomValues()
// {
//     $randomValues = array();
//     $randomCats = getRandomCats();
//     foreach ($randomCats as $randomCat => $values) {
//         $randomValues = array_merge($randomValues, $values);
//     }
//     shuffle($randomValues);
//     return $randomValues;
// }

// $arr = getRandomValues();
?>
<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
    </style>
</head>
<body>
    <table>
        <tbody>
            https://stackoverflow.com/questions/28093474/php-function-to-print-table-in-html
            <?php $arrCount = count((array)$arr);
            for ($i = 1; $i <= $arrCount/4; $i++) { ?>
                <tr>
                    <?php for ($j = 1; $j <= 4; $j++) { ?>
                        <?php $index = ($i - 1) * 4 + $j - 1; ?>
                        <td><?php echo $index ."\t". $arr[$index]; ?></td>
                    <?php } ?>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <br/>
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