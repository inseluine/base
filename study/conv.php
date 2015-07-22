<?php
$c = 'www.w.w.w';
$c = str_replace('w', 1, $c);
$c = str_replace('.', 0, $c);
echo $c;
echo '--';
echo bindec($c);
