<?php
$exchange = new Exchange;
$exchange->execute();

class Exchange {

    protected $nums;
    protected $basekey;
    protected $baseValue;
    protected $min = array();
    protected $max = array();
    protected $reuslt;

    function __construct() {
        $count = $this->getStdin();
        for($i = 0; $i < $count; $i++) {
            $this->nums[] = $this->getStdin(); 
        }


    }

    function execute() {
        

        $this->nums > $this->nums[-1];
        foreach ($this->nums as $num) {

           $this->check($num); 
        }
    }

    protected  function check($num) {
    }

    protected function isMax() {

    }

    protected function isMin() {

    }

    public function getStdin() {
        return trim(fgets(STDIN));
    }
}
