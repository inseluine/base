<?php
$inputNum = ((trim(fgets(STDIN));
echo ((($inputNum) % 2 !== 0) ? 'odd' : 'even') , "\n";

/*
<<問題>>
正の整数 N が入力されるので、N が奇数ならば"odd" 偶数ならば"even" と出力するプログラムを作成して下さい。

<<入力>>
入力は以下のフォーマットで、正の整数N が入力されます。

入力値最終行の末尾に改行が１つ入ります。

<<出力>>
N が奇数なら"odd" 偶数なら"even" と半角英文字で出力して下さい。
最後は改行し、余計な文字、空行を含んではいけません。
*/