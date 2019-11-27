<?php

/**
 * $ php bin/cli.php NameOfClass -argument1=value1 -b=value2
*/
try {

    unset($argv[0]);

    /**
     * Autoloader Composer
     */
    require_once __DIR__.'/../vendor/autoload.php';


    /**
     * Name of class Summator
    */
    $className = '\\Framework\\Console\\' . array_shift($argv);

    if (!class_exists($className))
    {
        throw new \Framework\Exceptions\Console\ConsoleException('Class "' . $className . '" not found');
    }


    /**
     * Prepare arguments listing
    */
    $params = [];

    foreach ($argv as $argument)
    {
        preg_match('/^-(.+)=(.+)$/', $argument, $matches);

        if (! empty($matches))
        {
            $paramName = $matches[1];
            $paramValue = $matches[2];

            $params[$paramName] = $paramValue;
        }
    }

    /**
     * Create example of class and give it params
     * And calling method execute()
    */
    $class = new $className($params);
    $class->execute();

} catch (\Framework\Exceptions\Console\ConsoleException $e) {

    echo 'Error: ' . $e->getMessage();

}

