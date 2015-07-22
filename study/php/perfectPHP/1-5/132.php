<?php
require_once('Employee.php');
class Programmer extends Employee
{
//デフォルト値を持つため、関数のオーバーライドの引数を変更しても大丈夫
    public function work($hoge = '1')
    {
        echo "プログラム書いてます",PHP_EOL;
    }
}
$sogawa = new Programmer('sogawa',Employee::REGULAR);
$sogawa->work();
