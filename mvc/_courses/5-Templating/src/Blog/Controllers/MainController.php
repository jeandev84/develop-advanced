<?php
namespace Blog\Controllers;


use Framework\Templating\View;


/**
 * Class MainController
 * @package Blog\Controllers
 */
class MainController
{

     /** @var View  */
     private $view;


     /**
      * MainController constructor.
     */
     public function __construct()
     {
         $this->view = new View(__DIR__ . '/../../../templates');
     }


    /**
      * @url 'http://localhost:8888/'
      * @return string
     */
     public function main()
     {
          $articles = [
              ['name' => 'Статья 1', 'text' => 'Текст статьи 1'],
              ['name' => 'Статья 2', 'text' => 'Текст статьи 2'],
          ];

          /* $this->view->renderHtml('blog/main/main.php', compact('articles')); */
          $this->view->renderHtml('blog/main/main.php', [
              'articles' => $articles
          ]);
     }


     /**
      * @url 'http://localhost:8888/hello/(.*)'
      * Example'http://localhost:8888/hello/username'
      * Example'http://localhost:8888/hello/jean'
      * @param string $name
     */
     public function sayHello(string $name)
     {
         /* echo 'Привет, '. $name; */
         $this->view->renderHtml('blog/main/hello.php', [
             'name' => $name
         ]);
     }
}