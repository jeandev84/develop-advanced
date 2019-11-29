<?php
namespace Blog\Controllers;


use Blog\Models\Articles\Article;
use Blog\Models\Users\User;
use Framework\Templating\View;


/**
 * Class ArticleController
 * @package Blog\Controllers
 */
class ArticleController
{

    /** @var View  */
    private $view;



    /**
     * ArticleController constructor.
     */
    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../../templates');
    }


    /**
     * @url 'http://localhost:8888/articles/1'
     * @url 'http://localhost:8888/articles/2'
     * @param int $articleId
     * @return string
    */
    public function view(int $articleId)
    {
        $article = Article::getById($articleId);

        if($article === null)
        {
            $this->view->renderHtml('blog/errors/404.php', [], 404);
            return;
        }

        $this->view->renderHtml('blog/articles/view.php', [
            'article' => $article
        ]);

    }


    /**
     * @url 'http://localhost:8888/articles/1/edit'
     * @url 'http://localhost:8888/articles/2/edit'
     * @param int $articleId
     * @return void
    */
    public function edit(int $articleId): void
    {
        $article = Article::getById($articleId);

        if ($article === null)
        {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }

        $article->setName('Новое название статьи');
        $article->setText('Новый текст статьи');

        $article->save();
    }

    /**
     * @param int $articleId
    */
    private function storageLocal(int $articleId)
    {
        $article = Article::getById($articleId);

        if ($article === null)
        {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }

        $article->setName('Новое название статьи');
        $article->setText('Новый текст статьи');

        /*
        debug($article);
        $article->setName('Новое название статьи');
        $article->setText('Новый текст статьи');
        debug($article);
        Blog\Models\Articles\Article Object
        (
           [name:protected] => Новое название статьи
           [text:protected] => Новый текст статьи
           [authorId:protected] => 1
           [createdAt:protected] => 2019-11-23 01:41:07
           [id:protected] => 1
        )
       */
    }
}