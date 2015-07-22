<?php
class RelaxPos
{

    public $a,$b;
    public static $x,$y,$R;
    public $result;

    public function __construct()
    {
        list($this->a, $this->b) = explode(' ', getStdin());
        $this->result = ((pow(($this->a - self::$x), 2) + pow(($this->b - self::$y), 2)) >= (pow(self::$R, 2))) ? 'silent' : 'noisy';
    }
}

list(RelaxPos::$x, RelaxPos::$y, RelaxPos::$R) = explode(' ', getStdin());
$relaxCnt = getStdin();

for ($i = 0; $i < $relaxCnt; $i++) {
    $name = 'relaxPos' . $i;
    $$name = new RelaxPos;
}

for ($i = 0; $i < $relaxCnt; $i++) {
    $name = 'relaxPos' . $i;
    echo $$name->result, "\n";
}

function getStdin()
{
    return trim(fgets(STDIN));
}

/*
<<問題>>
公園内で読書をするため、工事現場の騒音が届かない場所を探す。
工事現場は公園にただ一つだけあり、その位置は (a, b) です。
工事現場から距離 R メートル未満は騒音が大きいので読書には適していません。
また、公園には読書にうってつけの木陰が N 箇所あり、i 番目の木陰の位置は (x_i, y_i) です。

以上の情報が与えられたとき、各木陰が読書に適している(つまり、工事現場から R メートル以上離れている)かどうかを判定するプログラムを書いてください。

「位置 (x, y) が工事現場から R メートル以上離れている」という条件は以下の式で表されます。
(x-a)^2 + (y-b)^2 <= R^2

<<入力>>
1 行目には 3 つの整数 a、b、R が入力されます。
a、b はそれぞれ工事現場の位置の x 座標、y 座標を、R は工事現場の騒音の大きさを表します。
2 行目には木陰の数を表す整数 N が入力されます。 続く N 行には各木陰の座標を表す 2 つの整数 x_i、y_i が入力されます。

    a b R　　　#工事現場のx座標,工事現場のy座標,工事現場の騒音の大きさ
    N　　　　　#木陰の数
    x_1 y_1　　#木陰1のx座標,木陰1のy座標
    x_2 y_2　　#木陰2のx座標,木陰2のy座標
    ...
    x_N y_N　　#木陰Nのx座標,木陰Nのy座標

<<出力>>
出力は N 行からなります。 N 個の木陰それぞれに対して、その木陰が読書に適している
(つまり、工事現場から R メートル以上離れている)ならば "silent" と出力してください。
その木陰が読書に適していないならば "noisy" と出力してください。


*/
