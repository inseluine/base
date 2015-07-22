<?php
function getStdin()
{
    return trim(fgets(STDIN));
}

function informWin()
{
    echo 'You will win', "\n";
    exit;
}

function informLose()
{
    echo 'You will lose', "\n";
    exit;
}

$firstLine = preg_split('//', getStdin(), -1, PREG_SPLIT_NO_EMPTY);
$secondLine = preg_split('//', getStdin(), -1, PREG_SPLIT_NO_EMPTY);

$wrongCount = 0;
$atMarkCont = 0;

if (count($firstLine) !== count($secondLine)) {
    informLose();
}

for ($i = 0; $i < count($firstLine); $i++) {
    if ($firstLine[$i] !== $secondLine[$i]) {
        if ($firstLine[$i] == '@' || $secondLine[$i] == '@') {
            $atMarkCont++;
        } else {
            $wrongCount++;
        }
    }
}
    
if ($atMarkCont <= 1 && $wrongCount == 0) {
    informWin();
}else {
    informLose();
}
