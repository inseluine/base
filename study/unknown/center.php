<?php
$c = new Mark();
$c->execute();
$c->output();

class Mark
{
    private $questCnt;
    private $numbers;
    private $result = array('1' => '0', '2' =>'0', '3' =>'0', '4' => '0');

    public function __construct()
    {
        $this->questCnt = getStdin();
        $this->numbers = str_split(getStdin());
    }

    public function execute()
    {
        for($i = 1; $i <=4; $i++) {
            foreach($this->numbers as $num) {
                if($num == $i) {
                    $this->result[$i]++;
                 }
            }
        }
    }

    public function output()
    {
        echo max($this->result), ' ', min($this->result), "\n";
    }
}

function getStdin()
{
    return trim(fgets(STDIN));
}
