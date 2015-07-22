

<?php

$nums = array();

$base = trim(fgets(STDIN));

for ($i = 1; $i <= 9; $i++) {

    $nums[] = $i * $base;

    }

    echo implode(' ', $nums)."\n";


