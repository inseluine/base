<?php
$hoge = 10;
$hoge_obj = (object)$hoge;
var_dump($hoge_obj);

echo "StdClass test",PHP_EOL,$hoge_obj->scalar,PHP_EOL;

$array = array(
    'foo' => 2,
    'bar' => 3,
);
$array_obj = (object)$array;

var_dump($array_obj);
