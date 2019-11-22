<?php

/*
spl_autoload_register(function (string $className) {

    $classPath = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    $filePath = __DIR__ . '/../src/' . $classPath . '.php';
    if(! file_exists($filePath))
    {
        die(sprintf('File (%s) does not exist', $filePath));
    }
    require_once $filePath;
});
*/

require_once __DIR__ . '/../vendor/autoload.php';

$user = new \Entity\User('admin', 'Жан-Клод');
echo $user->getGreeting();