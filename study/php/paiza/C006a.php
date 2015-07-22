<?php
//$paramCnt:アイテムの種類数 $userCnt:ユーザー数 $rankDispCnt:ランキング表示数
list($itemCnt, $userCnt, $rankDispCnt) = explode(' ', getStdin());
//$worthItem:各アイテムの価値 C1,C2,C3...
$worthItem = explode(' ', getStdin());

//UserScore[]に各ユーザーのスコアを格納
for($i = 0; $i < $userCnt; $i++) {
    $userScore[$i] = 0;
    $userItemCnt = explode(' ', getStdin());
    for($j = 0 ; $j < $itemCnt; $j++) {
        $userScore[$i] += ($worthItem[$j] * $userItemCnt[$j]);
    }
    $userScore[$i] = round($userScore[$i]);
}

//arsortで$userScoreを逆順ソート
arsort($userScore);
//ランキング表示数だけarray_sliceで表示
$userRank = array_slice($userScore, 0, $rankDispCnt);

foreach ($userRank as $i) {
    echo $i, "\n";
}

function getStdin()
{
    return trim(fgets(STDIN));
}

/*
C006:ハイスコアランキング

<<問題>>
あなたはとあるアイテム集めゲームのユーザーランキングを作ることになりました。

アイテムの種類はN個あり、アイテムは種類ごとに得点が異なります。
各アイテム種別毎の1個あたりの得点はCiで表現され、ユーザーが持っている
それぞのアイテムの数はXiで表現されます。
（アイテムiの１個当たりの得点はCi、ユーザーの持ち数はXiという事です）

ユーザーのスコアは、各アイテム持ち数×各アイテムの得点の総和となります。

例）
　アイテム種別毎の得点
　　C1 = 1.5, C2 = 1.2, C3 = 2, C4 = 0.4

　ユーザーのアイテム持ち数
　　X1 = 49, X2 = 30, X3 = 2, X4 = 6486

　上記の場合スコアS
　　S = C1 * X1 + C2 * X2 + C3 * X3 + C4 * X4
　　　= 49 * 1.5 + 1.2 * 30 + 2 * 2 + 0.4 * 6486
　　　= 2707.9
　　　≒ 2708
　として算出します。

Sの値が小数になった場合は、小数第一位を四捨五入し、整数に
します。以上のスコア計算を、M人のユーザーに行い、トップKのスコア(Ｋ＝３の場合トップ３)を
出力してください。

<<入力>>
一行目にパラメータNの個数, ユーザーの人数M, トップK がスペースで区切られています。
二行目にN個のパラメータの各係数Ciがスペースで区切られています。
三行目からM+2行目まで各ユーザーのXiの数値がスペースで区切られています。

<<出力>>
上位スコアから順番K番目までのスコアを改行(\n)して標準出力で出力してください。

*/
