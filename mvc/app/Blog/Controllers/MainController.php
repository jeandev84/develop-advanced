<?php
namespace App\Blog\Controllers;


use App\Blog\Controllers\Contracts\AbstractController;
use App\Blog\Models\Articles\Article;


/**
 * Class MainController
 * @package App\Blog\Controllers
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