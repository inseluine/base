<?php
function _drop($num, $array)
{
    if ($num == 0) {
        return $array;
    }
    if($num > 0) {
        array_shift($array);
        return _drop(--$num, $array);
    }
}

