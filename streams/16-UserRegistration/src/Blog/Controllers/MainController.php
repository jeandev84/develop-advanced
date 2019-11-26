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

}