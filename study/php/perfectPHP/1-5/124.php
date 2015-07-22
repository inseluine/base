<?php
class Employees
{
    public $name;
    private $state = '働いている';

    public function getState()
    {
        return $this->state;
    }

    public function setState($state)
    {
        $this->state = $state;
    }

    public function work()
    {
        echo '書類を整理しています',PHP_EOL;
    }
}

$sgw = new Employees;
$sgw->name = 'sogawa';
$sgw->setState('休憩している');
$sgw->work();
echo $sgw->name,'さんは',$sgw->getState(),PHP_EOL;
