<?php
session_start();
$_SESSION['array'] = array();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8"/>
    <title>Web</title>
    <link rel="stylesheet" href="css/index.css" />
</head>
<body>

<div class = "header">
    <h2>Маликов Александр Максимович</h2>
    <h3>Группа: P3222, Вариант: 3287</h3>
</div>
<div class="container">
    <canvas id="canvas_plot" width="500" height="500"></canvas>
    <script src="js/index.js"></script>
    <form action="check.php" name="myForm" method="get" class="form" onsubmit="validate()" target="frame">
        <p><b>Введите значение для X, R и Y</b></p>
        <p><b>Значение для X</b></p>
        <b>-4</b>
        <label>
            <input class="checkbox" type="checkbox" name="x" value="-4">
        </label>
            <b>-3</b>
        <label>
            <input class="checkbox" type="checkbox" name="x" value="-3">
        </label>
            <b>-2</b>
        <label>
            <input class="checkbox" type="checkbox" name="x" value="-2">
        </label>
            <b>-1</b>
        <label>
            <input class="checkbox" type="checkbox" name="x" value="-1">
        </label>
            <b>0</b>
        <label>
            <input class="checkbox" type="checkbox" name="x" value="0">
        </label>
            <b>1</b>
        <label>
            <input class="checkbox" type="checkbox" name="x" value="1">
        </label>
            <b>2</b>
        <label>
            <input class="checkbox" type="checkbox" name="x" value="2">
        </label>
            <b>3</b>
        <label>
            <input class="checkbox" type="checkbox" name="x" value="3">
        </label>
            <b>4</b>
        <label>
            <input class="checkbox" type="checkbox" name="x" value="4">
        </label>
        <br>
        <p><b>Значение для Y</b><br>
            Введите любое число из отзерка: [-5; 3]<br>
        </p>
        <label>
            <input name="Y" type="text" class="textWindow"><br>
        </label>
        <p><b>Значение для R</b></p>
        <b>1.0</b>
        <label>
            <input type="radio" name="r" value="1">
        </label>
            <b>1.5</b>
        <label>
            <input type="radio" name="r" value="1.5">
        </label>
            <b>2.0</b>
        <label>
            <input type="radio" name="r" value="2">
        </label>
            <b>2.5</b>
        <label>
            <input type="radio" name="r" value="2.5">
        </label>
            <b>3.0</b>
        <label>
            <input type="radio" name="r" value="3"><br>
        </label>
        <label>
            <input type="submit" class="submit">
        </label>
    </form>
    <script>
        function validate(){
            let Y = document.forms["myForm"]["Y"].value;
            if (!Y.match(/^-?[0-9]\d*(\.\d+)?$/)){
                alert('Значение Y должно числом.')
                return false
            }else if (parseFloat(Y) < -5 || parseFloat(Y) > 3){
                alert('Значение Y должно находиться в указанном промежутке.')
                return false
            }
        }
    </script>
</div>
</body>
</html>