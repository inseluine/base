<?php
$changer1 = 'number';
$changer2 = "number";

echo $changer1,PHP_EOL;
echo '$changer1',PHP_EOL;
echo "$changer1",PHP_EOL,PHP_EOL;
echo $changer2,PHP_EOL;
echo '$changer2',PHP_EOL;
echo "$changer2",PHP_EOL, PHP_EOL;

$number = rand();
if($number % 2 == 0)
{
    echo "$number is even",PHP_EOL,$number,PHP_EOL,'$number',PHP_EOL;
}
else{
    echo "$number is odd",PHP_EOL,$number,PHP_EOL,'$number',PHP_EOL;
}
echo PHP_EOL;


if($$changer1 % 2 == 0)
{
    echo "$$changer1 is even",PHP_EOL,$$changer1,PHP_EOL,'$$changer1',PHP_EOL;
}
else{
    echo "$$changer1 is odd",PHP_EOL,$$changer1,PHP_EOL,'$$changer1',PHP_EOL;
}
echo PHP_EOL;

if($$changer2 % 2 == 0)
{
    echo "$$changer2 is even",PHP_EOL,$$changer2,PHP_EOL,'$$changer2',PHP_EOL;
}
else{
    echo "$$changer2 is odd",PHP_EOL,$$changer2,PHP_EOL,'$$changer2',PHP_EOL;
}
echo PHP_EOL;
