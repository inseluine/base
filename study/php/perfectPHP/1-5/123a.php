<?php
class Employees
{
    public $firstname;
    private $lastname;

    public function report()
    {
        echo $firstname,$lastname;
    }
}

$sgw = new Employees;
$sgw->firstname = 'sogawa';
$sgw->lastname = 'takahiro';

echo "\$sgw->firstname:$sgw->firstname",PHP_EOL;
echo "\$sgw->lastname:$sgw->lastname",PHP_EOL;

$sgw->report();
