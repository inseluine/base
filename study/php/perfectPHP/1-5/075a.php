<?php
function az(){
echo 1,PHP_EOL;
}
az();
echo PHP_EOL;
1 && az();
echo PHP_EOL;
0 && az();
echo PHP_EOL;
az() && 0;
echo PHP_EOL;
az() && 1;
echo PHP_EOL;
