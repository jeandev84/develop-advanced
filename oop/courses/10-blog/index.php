<?php

require ROOT .'/develop/Blog/Entity/User.php';
require ROOT .'/develop/Blog/Entity/Article.php';
require ROOT .'/develop/Blog/Entity/Admin.php';



# Example
/*
$author = new User('Иван');
$article = new Article('Заголовок', 'Текст', $author);
dump($article);
*/

/*
Get Author name
$author = new User('Иван');
$article = new Article('Заголовок', 'Текст', $author);

echo 'Имя автора: ' . $article->getAuthor()->getName();
*/

/*
Error Type Hiting
because 3-rd parameter must be instance of User,
but it's given instance of Cat

$author = new User('Жан');
$cat = new Cat('Барсик');
$article = new Article('Заголовок', 'Текст', $cat);
*/


/*
Error Type Hiting
because 3-rd parameter must be instance of User,
but it's given instance of Admin

$admin = new Admin('Саша');
$article = new Article('Заголовок', 'Текст', $admin);
*/



