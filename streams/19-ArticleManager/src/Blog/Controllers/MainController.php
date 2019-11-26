<?php
namespace Blog\Controllers;


use Blog\Controllers\Contracts\AbstractController;
use Blog\Models\Articles\Article;


/**
 * Class MainController
 * @package Blog\Controllers
*/
class MainController extends AbstractController
{

    /**
      * @url 'http://localhost:8888/'
      * @return string
     */
     public function main()
     {
         $articles = Article::findAll();
         $this->view->renderHtml('blog/main/main.php', [
             'articles' => $articles
         ]);
     }

}