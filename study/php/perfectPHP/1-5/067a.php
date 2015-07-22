<?php
$var = 1;
var_dump(isset($var));
$var = null;
var_dump(isset($var));
var_dump($var);

$var = 1;
unset($var);
var_dump(isset($var));
var_dump($var);
