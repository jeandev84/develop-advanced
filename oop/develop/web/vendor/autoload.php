<?php

/*
function myAutoLoader(string $className)
{
    # require_once __DIR__ . '/../src/' . $className . '.php';
    require_once SRC . $className . '.php';
}
*/

/**
 * @param string $className
 */
function myAutoLoader(string $className)
{
    require_once __DIR__ . '/../src/' . $className . '.php';
}

spl_autoload_register('myAutoLoader');