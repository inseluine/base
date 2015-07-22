<?php
list($eraNum1, $eraNum2) = explode(' ', trim(fgets(STDIN)));
//入力される値 $eraNum1 < $eraNum2
echo sprintf('%s', $eraNum2 - $eraNum1);

/*
<<問題))
2つの西暦 a, b が半角スペース区切りの整数で入力されます。
a から b が何年間あるか出力してください。
例えば
    1990 2014
と入力された場合
    24
と出力してください。 

<<入力>>
入力は以下のフォーマットで、正の整数 a, b が入力されます。
    a b

<<出力>>
a から b が何年間あるか出力してください。
*/
