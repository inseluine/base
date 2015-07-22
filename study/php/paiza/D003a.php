<?php
$base = trim(fgets(STDIN));
$nums = array_map(function ($i) use ($base) {
    return $i * $base;
    }, range(1,9));
var_dump($nums);
