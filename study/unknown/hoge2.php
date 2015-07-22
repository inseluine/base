<?php
function my_array_sum_f($array) {
    if(count($array) === 1) {
        // 配列の大きさが１なら、要素を返す
        return $array[0];
    }else if(count($array) >= 2) {
        // 配列の大きさが２以上なら、（最初の要素）＋（残りの要素の合計）を返す
        return $array[0] + my_array_sum_f(array_slice($array, 1));         // 変数から展開してます
    }
}

echo my_array_sum_f(array(1,2,3));
