<?php
abstract class Employee
{
    abstract public function work();
}

class Programmer extend Employee;
{
    public function work()
    {
    //
    }
}
