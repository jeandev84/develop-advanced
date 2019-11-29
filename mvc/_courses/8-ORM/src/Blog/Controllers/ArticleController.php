<?php
namespace Blog\Controllers;


use Framework\Services\Database\Db;
use Framework\Templating\View;


/**
 * Class ArticleController
 * @package Blog\Controllers
 */
class ArticleController
{

    /** @var View  */
    private $view;


    /** @var Db  */
    private $db;


    /**
     * ArticleController constructor.
     */
    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../../templates');
        $this->db = new Db();
    }


    /**
     * @url 'http://localhost:8888/articles/1'
     * @url 'http://localhost:8888/articles/2'
     * @param int $articleId
     * @return string
    */
    public function view(int $articleId)
    {
        /* echo 'Здесь будет получение статьи и рендеринг шаблона'; */

        $result = $this->db->query('SELECT * FROM `articles` WHERE id = :id;', [
            'id' => $articleId
        ]);

        // if(! $result) { }
        if($result === [])
        {
            // Здесь обрабатываем ошибку
            $this->view->renderHtml('blog/errors/404.php', [], 404);
            return;
        }

        /* dump($result, true); */
        $this->view->renderHtml('blog/articles/view.php', [
            'article' => $result[0]
        ]);
    }

}