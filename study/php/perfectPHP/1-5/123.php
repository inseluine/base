<?php

class Employee
{
    public $name;
    public $state = '働いている';

    public function work()
    {
        echo '書類を整理しています',PHP_EOL;
    }
}

$sgw = new Employee;
$sgw->work();
$sgw->name = '曽川';
echo $sgw->name;
echo $sgw->state;
