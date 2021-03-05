<?php
$a = 8;
$b = 7;
$c = 0;
if ($a >= 0 && $b >= 0) {
    $c = $a - $b;
} elseif ($a < 0 && $b < 0) {
    $c = $a * $b;
} elseif ($a < 0 && $b > 0 || $a > 0 && $b <0) {
    $c = $a + $b;
}
echo $c . '<br>';


$a = 10;
switch ($a) {
    case 0;
        echo '0 1 2 3 4 5 6 7 8 9 10 11 12 13 14 15';
        break;
    case 1;
        echo '1 2 3 4 5 6 7 8 9 10 11 12 13 14 15';
        break;
    case 2;
        echo '2 3 4 5 6 7 8 9 10 11 12 13 14 15';
        break;
    case 3;
        echo '3 4 5 6 7 8 9 10 11 12 13 14 15';
        break;
    case 4;
        echo '4 5 6 7 8 9 10 11 12 13 14 15';
        break;
    case 5;
        echo '5 6 7 8 9 10 11 12 13 14 15';
        break;
    case 6;
        echo '6 7 8 9 10 11 12 13 14 15';
        break;
    case 7;
        echo '7 8 9 10 11 12 13 14 15';
        break;
    case 8;
        echo '8 9 10 11 12 13 14 15';
        break;
    case 9;
        echo '9 10 11 12 13 14 15';
        break;
    case 10;
        echo '10 11 12 13 14 15';
        break;
    case 11;
        echo '11 12 13 14 15';
        break;
    case 12;
        echo '12 13 14 15';
        break;
    case 13;
        echo '13 14 15';
        break;
    case 14;
        echo '14 15';
        break;
    case 15;
        echo '15';
        break;
    default:
        echo 'Переменная a не в диапазоне от 0 до 15';
        break;
}


function minus($a, $b) {
    return $a - $b;
}
function plus($a, $b) {
    return $a + $b;
}
function mult($a, $b) {
    return $a * $b;
}
function div($a, $b) {
    return $a / $b;
}


function mathOperation($arg1, $arg2, $operation) {
    switch ($operation) {
        case 'minus';
            return minus($arg1, $arg2);
        case  'plus';
            return  plus($arg1, $arg2);
        case  'mult';
            return  mult($arg1, $arg2);
        case  'div';
            return  div($arg1, $arg2);
        default:
            return 'Нет такой операции';
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HomeWork-2</title>
</head>
<body>
</body>
<footer>
    <?php
    var_dump(date('d-m-Y'));
    ?>
</footer>
</html>

<?php
function power($val, $pow) {
    if ($pow != 0) {
        return $val * power($val, $pow - 1);
    }
    return 1;
}
echo power(5, 0);
?>


