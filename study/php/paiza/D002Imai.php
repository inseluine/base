■コーディング規約的な話

","の後はスペース１個あける
×$array = split(" ",$input_lines);
○$array = split(" ", $input_lines);

ifの後も
×if(
○if (

elseifのとき
×}else if($array[0] < $array[1])
○} elseif ($array[0] < $array[1])

ifとかelseとかforeachのとじカッコは同じ行に書く
○if ($array[0] > $array[1]) {

変数名はキャメル型を使う
×$input_lines
○$inputLines

■命名の話
$array とか型の名前は変数に使わない。$string とか
$numsとかにする

■ロジック的な話
問題の本質は『大きい方を出力する』だから
maxって関数を使うとよい

<?php
list($a, $b) = explode(' ', trim(fgets(STDIN)));
echo ($a == $b) ? ('eq') : (max($a, $b));
