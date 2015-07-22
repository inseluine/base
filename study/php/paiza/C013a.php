<?php
$hateNumber = getStdin();
$roomCnt = getStdin();
$hateFlag = 0;

for ($i = 0; $i < $roomCnt; $i++)
{
    $roomList[] = getStdin();
}

foreach ($roomList as $i) {
    hateCheck($i);
}

if ($roomCnt == $hateFlag) {
    echo 'none', "\n";
}

function getStdin()
{
    return trim(fgets(STDIN));
}

function hateCheck($roomNumber)
{
    global $hateNumber, $hateFlag;

    if (strpos($roomNumber, $hateNumber) === FALSE) {
        echo $roomNumber, "\n";
    } else {
        $hateFlag++;
    }
}
