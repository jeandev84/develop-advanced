<?php
namespace Blog\Controllers;


use Blog\Models\Articles\Article;
use Framework\Services\Database\Db;
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
         $this->view = new View(__DIR__.'/../../../templates');
     }


    /**
      * @url 'http://localhost:8888/'
      * @return string
     */
     public function main()
     {
         $articles = Article::findAll();
         $this->view->renderHtml('blog/main/main.php', compact('articles'));
     }


     /**
      * @url 'http://localhost:8888/hello/(.*)'
      * Example'http://localhost:8888/hello/username'
      * Example'http://localhost:8888/hello/jean'
      * @param string $name
     */
     public function sayHello(string $name)
     {
         $this->view->renderHtml('blog/main/hello.php', [
             'name' => $name
         ]);
     }


    public function list()
    {
        /*
        $articles = $this->db->query('SELECT * FROM `articles`;', [], Article::class);
        debug($articles, true);

        $articles = Article::findAll();
        $this->view->renderHtml('blog/main/main.php', compact('articles'));
        */
    }
}