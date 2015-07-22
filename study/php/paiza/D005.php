<?php
$nums = array();

list($firstTerm, $gapTerm) = explode(' ', trim(fgets(STDIN)));
$nums = array_map(function ($i) use ($firstTerm, $gapTerm) {
    return $firstTerm + ($gapTerm * $i);
}, range(0, 9));

echo implode(' ', $nums), "\n";

/*
/*$nums = 
