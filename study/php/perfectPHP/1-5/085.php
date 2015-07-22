<?php
$array1 = array(1,2,3,);

$array2 = array(
    'one' => '1',
    'two' => 2,
    '3',
);

echo '<array1 result>',PHP_EOL;
echo $array1[0],PHP_EOL;
echo $array1[1],PHP_EOL;
echo $array1[2],PHP_EOL;
echo PHP_EOL;

echo '<array2 result(key)>',PHP_EOL;
echo $array2['one'],PHP_EOL;
echo $array2['two'],PHP_EOL;
echo $array2['thr'],PHP_EOL;
echo PHP_EOL;

echo '<array2 result(???)>',PHP_EOL;
echo $array2[0],PHP_EOL;
echo $array2[1],PHP_EOL;
echo $array2[2],PHP_EOL;
echo PHP_EOL;

foreach ($fruits as $name => $value){
    echo "$name is one {$value['price']} yen {$value['count']}",PHP_EOL;
}
