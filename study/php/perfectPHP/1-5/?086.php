<?php
$fruits = array(
    'apple' => array(
        'price' => array('aaa' => 'bbb'),//100,
        'count' => 2,
    ),
    'banana' => array(
        'price' => 80,
        'count' => 5,
    ),
    'orange' => array(
        'price' => 90,
        'count' => 3,
    ),
);

foreach ($fruits as $name => $value){
    echo "$name is one {$value['price']} yen {$value['count']}",PHP_EOL;
}

echo $fruits['apple']['price']['aaa'];
