<!doctype html>
<html lang="ru-RU">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Лабораторная работа №1</title>
</head>
<body>
<div class="table">
    <?php

session_start();

$start = microtime(true);
$result = "Пока не ясно";
$localTime = date("H:i:s", strtotime('0 hour'));


    $y = json_decode($_GET['y']);
    $x = json_decode($_GET['x']);
    $r = json_decode($_GET['r']);

    $valid = validate($x, $y, $r);

    if ($valid == "valid"){
        check($x , $y, $r);
    }else{
        returnHtml($valid);
    }

function check($x , $y, $r){
    global $x;
    global $y;
    global $r;
    global $start;
    global $result;
    global $localTime;
    if (
        $x >= 0 && $y >= 0
    ){
        if ($y + $x - $r <= 0){
            $result = "Попадание";
        }else{
            $result = "Промах";
        }
    }
    else if ($x < 0 && $y < 0) {
        if ($x >= -$r && $y >= -($r/2)){
            $result = "Попадание";
        }else{
            $result = "Промах";
        }
    }
    else if ($x < 0 && $y > 0) {
        if (sqrt($x**2 + $y**2) <= $r/2) {
            $result = "Попадание";
        }else{
            $result = "Промах";
        }
    }else{
        $result = "Промах";
    }

    $time = microtime(true) - $start;
    if (!is_null($x) && !is_null($y) && !is_null($r)){
        $_SESSION['array'][] = "
            <div class='grid-row'>
                <div>
                    $x
                </div>
                <div>
                    $y
                </div>
                <div>
                    $r
                </div>
                <div>
                    $result
                </div>
                <div>
                    $localTime
                </div>
                <div>
                    $time
                </div>
            </div>    
        ";
        echo json_encode(
          array(
                  "xCoef" => ($x/$r),
                  "yCoef" => ($y/$r)
          )
        );
    }
    $return = "
        <div class='grid-table'>
           <div class='grid-row'>
                <div>
                    X
                </div>
                <div>
                    Y
                </div>
                <div>
                    R
                </div>
                <div>
                    Результат
                </div>
                <div>
                    Время отправки
                </div>
                <div>
                    Время выполнения
                </div>
            </div>". implode('', $_SESSION['array'])."
        </div>
    ";
    echo $return;
}

    function validate($x, $y, $r)
    {
        if ((is_int($x) || is_float($x)) && (is_int($y) || is_float($y)) && (is_int($r) || is_float($r))){
            if ($r > 0){
                return "valid";
            }else{
                return "R должно быть больше нуля";
            }
        }elseif (!is_null($x) && !is_null($y) && !is_null($r)){
            return "Переданы некорректные значения";
        }else{
            return "Server request";
        }
    }

    function returnHtml($valid){
        if ($valid != "Server request"){
            $_SESSION['array'][] = "
            <div class='grid-row'>
                <div>
                   $valid
                </div>
            </div>    
        ";
        }
        $echoValue = "
        <div class='grid-table'>
           <div class='grid-row'>
                <div>
                    X
                </div>
                <div>
                    Y
                </div>
                <div>
                    R
                </div>
                <div>
                    Результат
                </div>
                <div>
                    Время отправки
                </div>
                <div>
                    Время выполнения
                </div>
            </div>". implode('', $_SESSION['array'])."
        </div>
        ";
        echo $echoValue;
    }
?>
</div>
</body>
<style>
    *{
        font-family: 'Arial', fantasy;
        font-size: 27px;
    }

    body {
        display: inline;
        width: 100%;
        margin: 0 auto;
        background-color: #605CB1;
        color: #91FD7E;
    }
    header{
        font-family: serif;
        color: #91FD7E;
        font-size: 2.5em;
        text-align: center;
    }

    table{
        border-collapse: separate;
        border: none;
        width: 300px;
    }

    .grid-table {
        display: flex;
        flex-direction: column;
        text-align: center;
    }

    .grid-row {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr 1fr 2fr;

    }
</style
</html>