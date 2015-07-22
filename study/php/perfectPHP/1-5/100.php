<?php

$dice = range(1,6);
shuffle($dice);

foreach($dice as $value){
    if($value == 6)
    {
        continue;
    }
    echo $value, PHP_EOL;
}
