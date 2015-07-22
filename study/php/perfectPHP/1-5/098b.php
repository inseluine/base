<?php
$fruits_color = array(
    'apple' => 'red',
    'banana' => 'yellow',
    'orange' => 'orange',
);

var_dump($fruits_color);
echo PHP_EOL;

foreach($fruits_color as $key => &$value)
{
    echo $value, " ", $key, PHP_EOL;
    unset($value);
    $value = '!!!';
}
echo PHP_EOL;

var_dump($fruits_color);
echo PHP_EOL;
unset($value);
$value = '???';

var_dump($fruits_color);

foreach($fruits_color as $value2)
{
    echo $value2,PHP_EOL;
}

