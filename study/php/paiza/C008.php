<?php
list($startTag, $endTag) = explode(' ', getStdin());
$inputLine = getStdin();
for ($startPosition = 0, $endPosition = 0; (strpos($inputLine, $startTag, $startPosition) !== FALSE) && (strpos($inputLine, $endTag, $endPosition) !== FALSE); $endPosition = $endPosition + strlen($endTag)) {
    $startPosition = strpos($inputLine, $startTag, $startPosition) +  strlen($startTag);
    $endPosition = strpos($inputLine, $endTag, $endPosition);
    $extractionLen = $endPosition - $startPosition;
    if ($extractionLen == 0) {
        echo '<blank>', "\n";
    } else {
        echo substr($inputLine, $startPosition, $extractionLen), "\n";
    }
}

function getStdin()
{
    return trim(fgets(STDIN));
}

/*
C008:文字列の抽出

<<問題>>
 あなたは、ある文字列から「与えられた仕様に沿って」文字列を抽出する、というお仕事をすることになりました。
2つの異なったタグで囲まれた文字列を、与えられたテキストデータから抽出します。
例えば

    <abc> <xyz>#タグA、タグB 
    hoge<abc>piyo<xyz>#テキストデータS 

という入力がされた場合、

    piyo

と出力します。
※ # 以降はコメントです。

文字列を抽出する際の仕様は以下のように定義します。

１行目の入力のスペースで区切られた文字列、タグA、タグBで囲まれた文字列を２行目の入力の文字列Sから抽出して出力します。
タグAを開始タグ、タグBを終了タグとして考えます。
それぞれのタグはタグ開始文字'<'とタグ終了文字'>'で囲まれた半角英数文字列です。開始タグと終了タグは同じ文字列になる事はありません。
文字列Sは半角英数と<>のみです。

文字列を抽出する手順は以下の通りです。

① 文字列SからタグAを（左から）右に向かって検索する
② ①で検索したタグA出現位置からタグBを（左から）右に向かって検索する
③ 検索したタグA,Bに囲まれている文字列を抽出し出力する。また、抽出文字の長さが、0の場合、<blank>と出力する
④ タグBの出現位置から再度タグAを検索し、存在すればタグA出現位置からタグBを検索し③の処理を行い、存在しなければ処理を終了する
⑤ ④を繰り返す

以下のような入れ子状の入力も入れ子を考慮せず上記仕様に沿って文字列を取り出します。

入力例1
    <abc> <xyz>
    <abc>123<abc>456<xyz>789<xyz>

出力例1
    123<abc>456

入力例2
    <a> <b>
    <a><a><b>

出力例2
    <a>

<<入力>>
1行目に半角スペースで区切られた2つのタグが入力されます。
それぞれのタグはタグ開始文字'<'とタグ終了文字'>'で囲まれた半角英数文字列です。2つのタグは同じものは入力されません。
2行目に抽出処理を行う文字列データが入力されます。必ず一組以上のタグが含まれます。

それぞれの文字列は半角英数字とタグを表す<と>のみとします。<と>はタグ以外では出現しないものとします。
入力値最終行の末尾に改行が１つ入ります。

<<出力>>
タグで囲まれた文字列を出現した順に改行して出力してください。
もし、囲まれた文字列の長さが0の場合は<blank>という文字を出力してください。

*/
