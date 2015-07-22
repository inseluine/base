<?php

$width = 1000;
$height = 1000;
echo $height, ' ', $width, "\n";
for ($i = 0; $i < $height; $i++) {
    for ($j = 0; $j < $width; $j++) {
        if(rand() % 2) {
            echo 'w';
        } else {
            echo '.';   
        }
     }
     echo "\n";
}

