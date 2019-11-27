<?php

/**
 * @return string
*/
function sum()
{
    global $argv;
    unset($argv[0]);

    $sum = 0;

    foreach ($argv as $item)
    {
        $sum += $item;
    }

    return $sum ."\n";
}

echo sum();