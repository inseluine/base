<?php
$count = inputStdin();
for ($i = 1; $i < $count; $i++)
{
    $nums[] = inputStdin();
}

echo min($nums), "\n";

function inputStdin ()
{
    return trim(fgets(STDIN));
}
