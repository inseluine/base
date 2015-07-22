<?php
$input_lines = fgets(STDIN);
$array = split(" ",$input_lines);
if($array[0] > $array[1])
{
    echo $array[0],PHP_EOL;
}else if($array[0] < $array[1])
{
    echo $array[1],PHP_EOL;
}else if($array[0] == $array[1])
{
    echo 'eq',PHP_EOL;
}
