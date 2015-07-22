<?php
$c = new third;
echo $c->execute();

class third {
    public function __construct() {
        $this->count = $this->getStdin();
        $this->base = $this->getStdin();
        $this->nums = explode(' ', $this->getStdin());
        $this->descKeys = $this->nums;
        arsort($this->descKeys);
    }
    
    public function execute() {
        for ($range = 1; $range < $this->count; $range++) {
            foreach ($this->descKeys as $key => $value) {
                if ($this->nums[$key] < ceil($this->base / $range)) continue;

                if ((($key + $range) <= $this->count) && ($this->plus($key, $range))) {
                    echo $range; exit;
                }
                if ((($key - $range) >= 0) && ($this->minus($key, $range))) {
                    echo $range; exit;
                }
            }
        }
    }

    public function plus($key, $range, $value = 0) {
        if($range == 0) return ($value > $this->base) ? true : false;
        $value += $this->nums[$key + $range - 1]; 
        return $this->plus($key, $range - 1, $value);
    }

    public function minus($key, $range, $value = 0) {
        if($range == 0) return ($value > $this->base) ? true : false;
        $value += $this->nums[$key - $range - 1]; 
        return $this->minus($key, $range - 1, $value);
    }

    public function getStdin() {
        return trim(fgets(STDIN));
    }
}

/*
 長さnの整数の数列a0,a1,a2,...,an-1と整数Sが与えられる
 連続した部分数列で、和が整数S以上となる最短の部分数列の長さを求めよ
 また、本数列には必ずS以上となる部分数列が存在するものとする

 ■入力形式
 n
 S
 a0 a1 ... ai ... an-1

 ■入力例
 7
 13
 1 3 5 7 6 4 2

 ■解答例
 2（7, 6の部分和が最短）

 ■入力条件(Beginner)
 0
 */
