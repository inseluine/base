$base = trim(fgets(STDIN));

$nums = array_map(function ($i) use ($base) {
    return $i * $base;
    }, range(1, 9));

    echo implode(' ', $nums) . "\n";

    // array_mapの挙動を理解しよね～
