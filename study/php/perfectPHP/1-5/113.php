<?php
function add_one(&$value)
{
    $value += 1;
}

$a = 10;
add_one($a);

echo  $a,PHP_EOL;
