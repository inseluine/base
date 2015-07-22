<?php

class Test
{
    public $a,$b,$c;
    public static $number;
}

Test::$number = 1;

echo Test::$number, "\n";
