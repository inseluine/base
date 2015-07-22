<?php
$c = new SegmentClass;
$c->printSeg();


class SegmentClass
{
    public $inputNums = array();

    public $line1 = array();
    public $line2 = array();
    public $line3 = array();
    public $line4 = array();
    public $line5 = array();

    public $baseSegs = array(
        '0' =>  array('-', '|', '|', '-', '|', '|', ' '),
        '1' =>  array(' ', '|', '|', ' ', ' ', ' ', ' '),
        '2' =>  array('-', '|', ' ', '-', '|', ' ', '-'),
        '3' =>  array('-', '|', '|', '-', ' ', ' ', '-'),
        '4' =>  array(' ', '|', '|', ' ', ' ', '|', '-'),
        '5' =>  array('-', ' ', '|', '-', ' ', '|', '-'),
        '6' =>  array('-', ' ', '|', '-', '|', '|', '-'),
        '7' =>  array('-', '|', '|', ' ', ' ', '|', ' '),
        '8' =>  array('-', '|', '|', '-', '|', '|', '-'),
        '9' =>  array('-', '|', '|', '-', ' ', '|', '-'),
    );

    public function __construct()
    {
        $this->inputNums = explode(' ', $this->getStdin());
    }

    public function printSeg()
    {
        $this->generate();
        echo implode($this->line1), "\n";
        echo implode($this->line2), "\n";
        echo implode($this->line3), "\n";
        echo implode($this->line4), "\n";
        echo implode($this->line5), "\n";
    }

    public function generate()
    {
        foreach ($this->inputNums as $inputNum) {
            $this->line1 = array_merge($this->line1, array(' ', (string)$this->baseSegs[$inputNum][0], ' '));
            $this->line2 = array_merge($this->line2, array((string)$this->baseSegs[$inputNum][5], ' ', (string)$this->baseSegs[$inputNum][1]));
            $this->line3 = array_merge($this->line3, array(' ', (string)$this->baseSegs[$inputNum][6], ' '));
            $this->line4 = array_merge($this->line4, array((string)$this->baseSegs[$inputNum][4], ' ', (string)$this->baseSegs[$inputNum][2]));
            $this->line5 = array_merge($this->line5, array(' ', (string)$this->baseSegs[$inputNum][3], ' '));
        }
    }

    public function getStdin()
    {
        return trim(fgets(STDIN));
    }
}



