<?php
function f_abs($num)
{
    if($num < 0)
    {
        return - $num;
    }
    return $num;
}

echo f_abs($argv[1]),PHP_EOL;
