<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php learning</title>
</head>

<body>
    <H1>Qn1</H1>
    <?php
    $length = 89;
    $width = 89;
    $rectangle = $length * $width;
    $permeter = 2 * ($length + $width);
    echo "Rectangle={$rectangle} <br>";
    echo "Primeter={$permeter}";

    ?>
    <h2>Q2</h2>
    <?php
    $amount = 1000;

    $vat_rate = .15;
    $vat = $amount * $vat_rate;
    echo "Amount ={$amount} <br>";
    echo "Vat ={$vat}<br>";


    ?>
    <h3>q3</h3>
    <?php
    $num = 25;
    if ($num % 2 == 0) {
        echo " $num it is an even number";
    } else {
        echo "$num is a odd number";
    }
    ?>
    <h1>Q4</h1>
    <?php
    $a = 10;
    $b = 23;
    $c = 17;
    if ($a > $b && $a > $c) {
        echo "$a is the biggest number";
    } else if ($b > $a && $b > $c) {
        echo "$b is the biggest number";
    } else {
        echo "$c is the biggest number ";
    }
    ?>
    <h1> <br>Q5</h1>

    <?php
    for ($i = 10; $i <= 100; $i++) {
        if ($i % 2 == 0) {
            echo "<br> $i";
        }
    }
    ?>
    <h2>Q6 <br></h2>
    <?php
    $num = array(10, 20, 30, 40, 60);
    $src = 30;
    $find = false;
    foreach ($num as $nums) {
        if ($nums == $src) {
            $find = true;
            break;
        }
    }
    if ($find == true) {

        echo "Found $src";
    } else {
        echo "Cant found $src";
    }

    ?>
    <h2>Q7 <br></h2>
    <?php
    for ($i = 1; $i < 4; $i++) {
        for ($j = 1; $j <= $i; $j++) {
            echo " * ";
        }
        echo "<br>";
    }
    ?>
    <?php
    $b = 1;
    for ($i = 3; $i < 0; $i--) {
        for ($j = 1; $j > $i; $j++) {
            echo " $i ";
        }
        echo "<br>";
    }
    ?>

</body>

</html>