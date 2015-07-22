<?php
list($scaler, $unit) = explode(' ', trim(fgets(STDIN)));
//[km,m,cm]で入力された標準出力を[mm]で出力する
switch($unit) {
    case 'km':
        echo $scaler * 1000000, "\n";
        break;
    case 'm':
        echo $scaler * 1000, "\n";
        break;
    case 'cm':
        echo $scaler * 10, "\n";
        break;
}

/*
<<問題>>
距離 n とその単位 s がスペース区切りで与えられるので、すべての距離をmmに換算し出力してください。

<<入力>>
入力は以下のフォーマットで、距離 n と単位 s が半角スペース区切りで入力されます。
入力値最終行の末尾に改行が１つ入ります。

<<出力>>
n を 単位 s から「mm」に換算し数字のみ出力して下さい。
最後は改行し、余計な文字、空行を含んではいけません。

*/
