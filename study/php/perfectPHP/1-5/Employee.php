<?php
class Employee
{
    const PARTTIME = 0x01;
    const REGULAR = 0x02;
    const CONTRACT = 0x04;

    private $name;
    private $type;

    public final function work()
    {
        echo "働いています。",PHP_EOL;
    }

    public function __construct($name, $type)
    {
        $this->name = $name;
        $this->type = $type;
    }
}
