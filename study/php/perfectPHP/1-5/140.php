<?php
class Employee
{
    public function __toString()
    {
        return 'This class is: '. __CLASS__;
    }
}

$sgw = new Employee;
echo $sgw;
echo __CLASS__;
