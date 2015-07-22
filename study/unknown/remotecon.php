<?php
list($before, $after) = explode(' ', getStdin());
$diff = abs($after - $before);
$btnCnt = 0;
//現在設定温度と希望温度が同じ場合
if ($diff == 0) {
    echo '0';
    exit;
}

while($diff > 0) {
    if ($diff >= 10) {
        $btnCnt++;
        $diff -= 10;
    } elseif ($diff >= 5) {
        $btnCnt++;
        $diff -= 5;
    } else if($diff >= 2) {
        $btnCnt++;
        $diff -= 1;
    }
}
        
echo $btnCnt;

function getStdin()
{
    return trim(fgets(STDIN));
}
