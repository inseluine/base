<?php

$c = new C010();
$c->execute();
$c->output();

class C010 {
    private $a;
    private $b;
    private $R;
    private $posCount;
    private $ans = array();

    public function __construct()
    {
        list($this->a, $this->b, $this->R) = explode(' ', $this->stdin());
        $this->posCount = $this->stdin();
    }

    public function execute()
    {
        for ($i = 0; $i < $this->posCount; $i++) {
            list($x, $y) = explode(' ', $this->stdin());
            $this->ans[] = ($this->inNoisyArea($x, $y)) ? ('noisy') : ('silent');
        }
    }

    public function output()
    {
        echo implode("\n", $this->ans)."\n";
    }

    private function inNoisyArea($x, $y)
    {
       return (pow(($x - $this->a), 2) + pow(($y - $this->b), 2) < pow($this->R, 2));
    }

    private function stdin()
    {
        return trim(fgets(STDIN));
    }

}
