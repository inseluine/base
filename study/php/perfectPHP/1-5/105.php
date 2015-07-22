<?php
$is_error = $argv[1];

echo "is_error:",$is_error,PHP_EOL;
if($is_error){
    echo "if true",PHP_EOL;
    goto error;
}
else
{
    echo "if false",PHP_EOL;
    goto good;
}

error:
    echo "error",PHP_EOL;
    exit(1);

good:
    echo "good",PHP_EOL;
    exit(1);
