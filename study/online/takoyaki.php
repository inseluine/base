<?php
function getInput()
{
    return trim(fgets(STDIN));
}
$count = getInput();

for ($i = 0; $i < $count; $i++)
{
    $nums[] = getInput();
}

$min = 100;

foreach ($nums as $i) {
    if($min > $i) {
        $min = $i;
    }
}

echo $min, "\n";
