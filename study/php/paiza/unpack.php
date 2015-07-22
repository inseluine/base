<?php

function array_zip(...$arrays) {
    return array_merge(...array_map(NULL, ...$arrays));
}

$a = array(1, 4, 7);
$b = array(2, 5, 8);
$c = array(3, 6, 9);

var_dump(implode(', ', array_zip($a, $b, $c)));

// Output
string(25) "1, 2, 3, 4, 5, 6, 7, 8, 9"

/*
まずarray_zipの中のarray_mapで先頭から一個ずつ抜き出して配列にした配列を作って
[[1, 2, 3], [4, 5, 6], [7, 8, 9]]みたいにする
それを一個ずつの配列としてarray_mergeに渡して[1, 2, 3, 4, 5, 6, 7, 8 , 9]にする 
*/
