<?php
//D005(foreach) 等差数列問題
$nums = range(0,9);

list($firstTerm, $gapTerm) = explode(' ', trim(fgets(STDIN)));

foreach ($nums as $i) {
    $nums[$i] = $firstTerm + ($gapTerm * $i);
}

echo implode(' ', $nums), "\n";
