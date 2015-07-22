<?php
    $input_lines = trim(fgets(STDIN));
    $array = split(" ",$input_lines);
    var_dump($array);

    if($array[0] > $array[1])
    {
        echo $array[0],PHP_EOL;
    }else if($array[0] < $array[1])
    {
        echo $array[1],PHP_EOL;
    }else if($array[0] === $array[1])
    {
        echo 'eq',PHP_EOL;
    }
/*
D002:数の比較

問題文
    ある正の整数aとbがスペース区切りで入力されます。
    aとbを比較し大きい方の値を出力して下さい。aとbが同じ場合は「eq」と出力して下さい。 

入力される値
    正の整数aとbが半角スペース区切りの文字列1行で入力されます。
    入力値最終行の末尾に改行が１つ入ります。

期待する出力
    標準出力に半角数字でaとbの値の大きい方を出力してください。aとbが同じ値の場合は半角小文字アルファベットで「eq」と出力してください。
    最後は改行し、余計な文字、空行を含んではいけません。 

条件
    すべてのテストケースで以下の条件を満たします。

    a、bは正の整数
    0 ≦ a ≦ 1000
    0 ≦ b ≦ 1000
*/
