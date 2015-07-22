<?php
$param = isset($argv[1]) ? $argv[1] : 'default';
echo $param,PHP_EOL;

$arg = isset($argv[1]) ?: 'sedon';
echo $arg,PHP_EOL;
