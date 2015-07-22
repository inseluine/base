<?php
/*
■1. 「_take()」 配列の先頭よりn個の要素を配列として返す
ex) _take(3, [1, 2, 3, 4, 5]) // 1, 2, 3
*/

function _take($num, $array)
{
    if ($num == count($array)) {
       return $array; 
    }
    if ($num < count($array)) {
        array_pop($array);
        return _take($num, $array);
    }
}

var_dump(_take(3,range(1,5)));
