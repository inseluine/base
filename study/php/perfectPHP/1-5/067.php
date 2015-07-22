<?php
function no_return_func(){
echo 1;
}

$null_value = no_return_func();
var_dump($null_value);
