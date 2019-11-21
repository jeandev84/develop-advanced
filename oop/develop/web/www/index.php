<?php

define('WWW', __DIR__ . '/web/');
define('SRC', WWW .'/src/');


# Load classes
/*
require WWW .'/src/Project/Models/Users/User.php';
require WWW .'/src/Project/Models/Articles/Article.php';

$author = new \Project\Models\Users\User('Иван');
$article = new \Project\Models\Articles\Article('Заголовок', 'Текст', $author);
dump($article);


function myAutoLoader(string $className)
{
    require_once __DIR__.'/../src/'. $className . '.php';
}
spl_autoload_register('myAutoLoader');

require WWW .'/vendor/autoload.php';

*/

spl_autoload_register(function (string $className) {
    /* dump($className, true); */
    $classPath = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    $filePath = __DIR__ . '/../src/' . $classPath . '.php';
    if(! file_exists($filePath))
    {
         die(sprintf('File (%s) does not exist', $filePath));
    }

    require $filePath;
});


$author = new \Project\Models\Users\User('Иван');
$article = new \Project\Models\Articles\Article('Заголовок', 'Текст', $author);
dump($article);