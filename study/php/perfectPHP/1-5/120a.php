<?php
class Employee
{
    public function work1()
    {
        echo '書類を整理しています',PHP_EOL;
    }
    public function work2()
    {
        echo 'work2 ifiefa',PHP_EOL;
    }
}

$yamada = new Employee();
$yamada->work1();
$suzuki = clone $yamada;
$suzuki->work1();
$yamada->work2();
