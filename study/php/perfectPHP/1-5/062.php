<?php
$string1 = 'this is string';
$string2 = "this is string";
$string3 = 'hi,$string2 \n';
$string4 = "hi,$string2 \n";

echo "$string1",PHP_EOL;
echo "$string2",PHP_EOL;
echo "$string3",PHP_EOL;
echo "$string4",PHP_EOL;
var_dump($string1);
var_dump($string2);
var_dump($string3);
var_dump($string4);
var_dump(15.01);

echo 15.0,234,PHP_EOL;

$hear = <<<EOI
hoge1 afaefjaoj
hoge2
hoge3
EOI;
echo $hear;
echo PHP_EOL;

$a = "123.0";
var_dump($a);
echo $a;
