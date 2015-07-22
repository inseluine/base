<?php
$c = new S7;
$c->execute();

class S7 {
    public function __construct() {
        $this->source = trim(fgets(STDIN));          
        $this->len = strlen($this->source);
        $this->contain = array();

        $this->list = $this->getAlphaIndex();
    }

    public function getInString($target) {
        $result = array();
        if ($left = strpos($target, '(')) {
            $right = strpos($target, ')');
            substr($target, $left + 1, $right - 1);
        }
    }

    protected function getAlphaIndex() {
        $index = array();
        for ($i = 'a'; $i != 'aa'; $i++) {
            $index[$i] = null;
        }
        return $index;
    }

    protected function isAlpha($char) {
        return ('a' <= $char && $char <= 'z');
    }

    protected function genRepeatString($string) {
        $nums = array();
        for ($i =0; (! $this->isAlpha($string[$i])); $i++) {
            if (! $this->isAlpha($string[$i] )) {
                $nums[] = $string[$i];
            }
        }

        $result = 0;
        foreach($nums as $key =>$num) {
            $result += $num * pow(10, $key);
        }
        var_dump($result);exit;
        return $result;
    }

    protected function genString($count, $string) {
       return str_repeat($string, $count); 
    }

    public function execute() {
        $this->genRepeatString('12foia');exit;

        for ($i = 0; $i < $this->len; $i++) {
            if ( 'a' <= $this->source[$i] && $this->source[$i] <= 'z') {
                echo $this->source[$i];
            }
        }
    }



}

