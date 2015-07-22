<?php

$a = array('a' => 1,'b'=> 3, 'c'=>5, 1=>1, 2=>2, 3=>3, 10=>10);
$b = array('a' => 1,'c'=> 5, 'b'=>3);
$c = array('a' => 1,'b'=> 2, 'd'=>6, 5=>5);

var_dump($a == $b);
var_dump($a === $b);

var_dump($a + $c);
$d = $c + $a;
echo $d['a'],PHP_EOL,$d['b'],PHP_EOL,$d['c'],PHP_EOL;
