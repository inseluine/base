<?php
//変数の前後に()をつけておく
    $ipRegex1 = "[1-9]?[0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5]";
    $ipRegex2 = "$ipRegex1|\*|\[$ipRegex1\-$ipRegex1\]";
    $ipRegex3 = "($ipRegex1)\.{2}($ipRegex2)\.($ipRegex2)";

    preg_match_all("/$ipRegex3/", getStdin(), $matches, PREG_PATTERN_ORDER);
    print_r($matches);
    var_dump($matches);

function getStdin()
{
    return trim(fgets(STDIN));
}
