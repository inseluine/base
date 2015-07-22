<?php
require_once('Employees.php');
Employees::$company = 'AsiaQuest';
$sgw = new Employees();
$sgw->name = 'sogawa';
$sgw->hoge = 'yeah!';
echo $sgw->name,PHP_EOL;
echo $sgw->hoge,PHP_EOL;
echo Employees::$company,PHP_EOL;

echo Employees::PARTTIME,PHP_EOL;
echo 'Setcompany done...',PHP_EOL;
Employees::SetCompany('IS');
echo Employees::$company,PHP_EOL;
