<?php
$array = array(
    '"ダブルクオート"',
    '<tag>',
   '\'シングルクオート\'',
);

$escaped = array_map(function($value){
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}, $array);
