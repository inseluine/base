<?php

$c = new C014();
$c->execute();
$c->output();

class C014
{
    private $n;
    private $r;
    private $dia;
    private $ans = array();

    public function __construct()
    {
        list($this->n, $this->r) = explode(' ',getStdin());
        $this->dia = 2 * $this->r;
    }

    public function execute()
    {
        for($i = 1; $i <= $this->n; $i++) {
            list($h, $w, $d) = explode(' ', getStdin());
            if ($this->dia <= $h && $this->dia <= $w && $this->dia <=$d) {
                $this->ans[] = $i;
            }
        }
    }

    public function output()
    {
        echo implode("\n", $this->ans) . "\n";
    }
}

function getStdin()
{
    return trim(fgets(STDIN));
}
    

/*
<<問題>>
半径r のお気に入りのボールを手に入れたあなたは、それを収納することができる箱を探しています。
今、n 個の箱があり、i (1 ≦ i ≦ n) 番目の箱は高さh_i、幅w_i、奥行きd_i です。各
箱においてボールの直径が、箱の高さ、幅、奥行きの3つの長さのうち最も短いもの以下であれば、無事にボールを収納することができます。
ボールの半径と箱の情報が与えられるので、ボールを収納することができる箱の番号を昇順にすべて答えてください。

<<入出力例>>
--入力
    4 2
    6 6 6
    4 6 4
    6 1 1
    4 4 4
--出力
    1
    2
    4

<<入力>>
入力は以下のフォーマットで与えられます。

    n r　　　#箱の数n, ボールの半径r 表す整数
    h_1 w_1 d_1　　　#1個目の箱の高さ、幅、奥行きを表す整数
    h_2 w_2 d_2　　　#2個目の箱の高さ、幅、奥行きを表す整数
    ...
    h_n w_n d_n　　　#n個目の箱の高さ、幅、奥行きを表す整数

<<出力>>
ボールを収納することができる箱の番号を昇順にすべて、改行区切りで出力してください。

最後は改行し、余計な文字、空行を含んではいけません。
*/
