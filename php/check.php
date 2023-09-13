<?php

session_start();

$start = microtime(true);
$result = "Пока не ясно";
$localTime = date("H:i:s", strtotime('0 hour'));
$html = "";

$postHtml = "<table id='result_table'>
                <th>X</th>
                <th>Y</th>
                <th>R</th>
                <th>Результат</th>
                <th>Время отправки</th>
                <th>Время выполнения</th>";


if (!empty($_GET)){
    $y = json_decode($_GET['y']);
    $x = json_decode($_GET['x']);
    $r = json_decode($_GET['r']);

    check($x, $y, $r);
}else{
    $_SESSION['array']= array();
    echo json_encode(
        array(
            'html' => ($postHtml . "</table>")
        )
    );
}

function check($x , $y, $r){
    global $start;
    global $result;
    global $html;
    global $localTime;
    global $postHtml;
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
    $html = "";
    $_SESSION['array'][] = "<tr class='values'>
                <td>$x</td>
                <td>$y</td>
                <td>$r</td>
                <td>$result</td>
                <td>$localTime</td>
                <td>$time</td>   
                </tr>";
    $return = $postHtml. implode('', $_SESSION['array']) . "</table>";
    echo json_encode(
        array(
            'result' => $result,
            'xCoef' => ($x/$r),
            'yCoef' => ($y/$r),
            'html' => $return
        )
    );
}