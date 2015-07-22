<?php
$a = trim(fgets(STDIN));
for ($i = 1; $i <= 9; $i++){
    echo ($a * $i);
    echo ($i === 9) ? PHP_EOL : ' ';
}

/*
<<問題>>
ある正の整数nが入力されます。
正の整数1から9に整数nをそれぞれを掛けた数を半角スペース区切りで出力して下さい。

<<入力>>
入力は以下のフォーマットで与えられます。
入力値最終行の末尾に改行が１つ入ります。
n(正の整数)

<<出力>>
正の整数nを1から9の数を掛けた数を半角スペース区切りで出力してください
最後は改行し、余計な文字、空行を含んではいけません。 

<<条件>>
すべてのテストケースで以下の条件を満たします。
1 ≦ n ≦ 100
*/
