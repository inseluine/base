<?php
/*
$count = getStdin();
$base = getStdin();
$nums = explode(' ',getStdin());
*/

//流れ的には解が1,2,3...と出力する順番で解いていく

$count = 20;
$base = 20;
$nums = [1,2,3,4,5,6,7,8,9,10,11,12,20,14,15,16,17,18,19,20];
$select = arsort($nums);

//case 1
if (max($nums) >= $base) {
    echo "1\n"; 
    return;
}

//case 2-
foreach($select as $key =hoge) {
    
}

arsort($nums);
foreach ($nums) {
    $nums 

function getStdin() {
    return trim(fgets(STDIN));
}
