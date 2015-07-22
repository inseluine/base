<?php
$c = new C013();
$c->execute();
$c->output();

class C013
{
    private $hateNum;
    private $roomCnt;
    private $safeRoom = array();

    
    public function __construct()
    {
        $this->hateNum = getStdin();
        $this->roomCnt = getStdin();
    }

    public function execute()
    {
        for($i = 0; $i < $this->roomCnt; $i++) {
            $number = getStdin();
            if (strpos($number, $this->hateNum) === FALSE) {
                $this->safeRoom[] = $number;
            }
        }
    }
        
    public function output()
    {
        echo (count($this->safeRoom) == 0) ? ('none') : (implode("\n", $this->safeRoom)) , "\n"; 
    }
}

function getStdin()
{
    return trim(fgets(STDIN));
}

/*
<<問題>>
あなたは運悪く病気にかかってしまい入院しなくてはいけなくなりました。
しかし、嫌いな数字があり、その数字が含まれる部屋番号の病室に入ると治療がうまく行かないのでは無いかと不安になってしまいます…。
そこで、部屋番号のどの桁にも嫌いな数字が含まれていない病室をリストアップして入院先に伝えることにしました。

・1行目に嫌いな数字 n (0から9までの1桁の数字)
・2行目に病室の総数 m
・3行目以降に各病室の部屋番号を表す整数 r_i (1 <= i <= m)

が改行区切りで与えられるので、希望する病室の部屋番号をすべて改行区切りで出力して下さい。
もし、希望する病室が1つもない場合は"none" と出力して下さい。

<<入出力例>>
--入力--
    4
    5
    101
    204
    301
    401
    501
--出力--
    101
    301
    501

<<入力>>
    n #嫌いな数字
    m #病室の総数
    r_1 #1個目の部屋番号
    r_2 #2個目の部屋番号
    ...
    r_m #m個目の部屋番号

<<出力>>
希望する病室をそれぞれ1行に、入力された順番を崩すことなくすべて出力してください。
もし希望する部屋が1つもなければ"none" と出力してください。
最後は改行し、余計な文字、空行を含んではいけません。

*/
