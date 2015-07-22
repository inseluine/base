<?php

function func_caller($function_name)
{
    if(function_exists($function_name))
    {
         return $function_name('1','2');
    }
}

function add($a,$b)
{
    return $a + $b;
}

echo "add result:",add(1,2),PHP_EOL;
echo "func_caller:",func_caller('add'),PHP_EOL;

