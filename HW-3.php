<?php
$a = 0;
while ($a <= 100) {
    echo "$a<br>";
    $a ++;
}

$b = 0;
do {
    if ($b == 0) {
        echo $b . '- ноль' . '<br>';
 } elseif ($b%2 == 0) {
        echo $b . '- это четное число' . '<br>';
    } else {
        echo $b . '- это нечетное число' . '<br>';
    }
    $b++;
} while ($b <= 10);

$country = [
   'Московская область' => ['Москва', 'Зеленоград', 'Клин'],
   'Ленинградская область' => ['Санкт-Петербург', 'Всеволожск', 'Павловск', 'Кронштадт'],
   'Рязанская область' => ['Касимов', 'Скопин', 'Рязань']
];
 foreach ($country as $area => $cities) {
     echo $area . ' : <br>';
     $c = 0;
     foreach ($cities as $city) {
         if ($c == count($cities) - 1) {
             echo $city;
         } else {
             echo $city . ', ';
         }
         $c++;
     }
     echo '<br>';
 }

function perevod($letters) {
$translit = array(
    "а" => "a",
    "б" => "b",
    "в" => "v",
    "г" => "g",
    "д" => "d",
    "е" => "e",
    "ё" => "yo",
    "ж" => "zh",
    "з" => "z",
    "и" => "i",
    "й" => "y",
    "к" => "k",
    "л" => "l",
    "м" => "m",
    "н" => "n",
    "о" => "o",
    "п" => "p",
    "р" => "r",
    "с" => "s",
    "т" => "t",
    "у" => "u",
    "ф" => "f",
    "х" => "h",
    "ц" => "ts",
    "ч" => "ch",
    "ш" => "sh",
    "щ" => "s'h",
    "ъ" => "",
    "ы" => "i",
    "ь" => "'",
    "э" => "e",
    "ю" => "yu",
    "я" => "ya",
);
    $sentence = strtr($letters, $translit);
        echo $sentence;
}
perevod("я учусь на гикбрейнс");

function replace($space) {
    echo str_replace(" ", "_", $space);
};
replace("Происходит замена  всех    пробелов на нижнее   подчеркивание");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HomeWork-3</title>
</head>
<body>
<?php
    $list = [
        ["Пункт 1", "Пункт 2", "Пункт 3", "Пункт 4", "Пункт 5"],
    ];
echo "<ul>";
for ($d = 0; $d < count($list); $d++) {
    for ($e = 0; $e < count ($list [$d]); $e++) {
        echo "<li>" . $list[$d][$e] . "</li>";
    }
}
echo "</ul>";
?>
</body>
</html>

<?php
for ($f = 0; $f < 10; print $f++) {
}
?>

