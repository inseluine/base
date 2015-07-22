<?php
function &add_one(&$value)
{
    $value += 1;
    return $value;
}
$a = 10;
$b = &add_one($a);
echo '$a:',$a,' $b:',$b,PHP_EOL;
$b += 1;
echo '$a:',$a,' $b:',$b,PHP_EOL;
$a += 1;
echo '$a:',$a,' $b:',$b,PHP_EOL;
$b += 1;
echo '$a:',$a,' $b:',$b,PHP_EOL;

echo $a, PHP_EOL;
