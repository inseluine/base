<?php
function stdin()
{
    return trim(fgets(STDIN));
}

$names = array();
$count = stdin();
for ($i = 0; $i < $count; $i++) {
    $names[] = stdin();
}
echo 'Hello ', implode(',', $names) , ".\n";
