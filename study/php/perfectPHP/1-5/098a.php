<?php

$fruits_color = array(
    'apple' => 'red',
    'banana' => 'yellow',
    'orange' => 'orange',
);

foreach($fruits_color as $value)
{
    echo $value,PHP_EOL;
    $value = 'pine';
}
echo "value:",$value,PHP_EOL;

foreach($fruits_color as $key => $value)
{
    echo $value,PHP_EOL;
}
echo "value:",$value,PHP_EOL;

foreach($fruits_color as &$value)
{
    echo $value,PHP_EOL;
    $value = 'fake';
}
echo "value:",$value,PHP_EOL;

foreach($fruits_color as $value)
{
    echo $value,PHP_EOL;
}
echo "value:",$value,PHP_EOL;

foreach($fruits_color as &$value)
{
    $value = 'already write';
}
$value = '!!!!!!!!!!!!!!!';
var_dump($fruits_color);
foreach($fruits_color as $value)
{
    echo $value,PHP_EOL;
}
var_dump($fruits_color);


