<?php
require('141.php');

$obj = new SomeClass();
$obj->foo = 10;
echo $obj->foo,PHP_EOL;
var_dump($obj);
var_dump(isset($obj->foo));
var_dump(empty($obj->foo));
