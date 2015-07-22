<?php
$inputNum = trim(fgets(STDIN));
echo ($inputNum > 0) ? ($inputNum) : (-$inputNum);

//標準関数でabsも見つけました
//echo abs(trim(fgets(STDIN)));
