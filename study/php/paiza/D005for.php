<?php
//D005(for) 等差数列問題
$nums = array();

list($firstTerm, $gapTerm) = explode(' ', trim(fgets(STDIN)));
$limit = $firstTerm + ($gapTerm * 9);
for($i = $firstTerm; $i <= $limit; $i += $gapTerm) {
    $nums[] = $i;
}

echo implode(' ', $nums), "\n";
