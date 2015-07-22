<?php
define('sogawa','wikeda');
//$list = array('one' => 1,'two' => 2, 'thr' => 3,)
$list = array('one' => 1,'two' => 2,'thr' => 3);
$list =  array_merge($list,array('fifi' => 55));
$list[] = 20;
$list['twfi'] = 25;
$list[] = 30;
$list = array_merge($list,array('100' => 100));
$list = array_merge($list,array('7' => 7));
echo $list['7'],PHP_EOL;
foreach($list as $key => $value)
{
    echo "value:",$value," key:",$key,PHP_EOL;
}

var_dump($list);

echo $value,PHP_EOL,$key,PHP_EOL;
