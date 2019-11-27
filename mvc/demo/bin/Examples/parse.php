<?php
/**
 * $ php bin/cli.php -a=25 -b=10
*/

/**
 * @return array
*/
function parse()
{
    global $argv;
    unset($argv[0]);

    $params = [];

    foreach ($argv as $argument)
    {
        preg_match('/^-(.+)=(.+)$/', $argument, $matches);

        if (!empty($matches)) {
            $paramName = $matches[1];
            $paramValue = $matches[2];

            $params[$paramName] = $paramValue;
        }
    }

    return $params;
}

print_r(affectation());

/*
$ php bin/cli.php -a=3 -b=5
Array
(
    [a] => 3
    [b] => 5
)
*/