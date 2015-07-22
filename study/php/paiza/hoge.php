<?php
echo getStdin();
echo getStdin();
echo getStdin();

function getStdin()
{
        return trim(fgets(STDIN));
}
