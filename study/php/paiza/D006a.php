<?php
list($scaler, $unit) = explode(' ', trim(fgets(STDIN)));

$distanceList = array(
    'km' => 1000000,
    'm' => 1000,
    'cm' => 10,
);

echo ($scaler * $distanceList["$unit"]);
