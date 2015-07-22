<?php

$array = array(1,2,3,4,5,);
for ($i = 0, $end = count($array); $i < $end; ++$i){
    echo $array[$i],PHP_EOL;
}
echo PHP_EOL;
foreach($array as $value){
    echo $value, PHP_EOL;
}
