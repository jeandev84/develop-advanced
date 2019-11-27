<?php
/**
 * Recuperer les arguments en console
 * Et faire la somme
*/

# require __DIR__.'/Components/User.php';
require __DIR__ . '/Examples/parse.php';


/**
 * Sum CLI
 * @return string
*/
/*
function sumCli()
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

echo sumCli();
*/

/*
$ php bin/cli.php
print_r($argv);

$ php bin/cli.php 3 4 5
Array
(
    [0] => bin/cli.php
    [1] => 3
    [2] => 4
    [3] => 5
)
*/




