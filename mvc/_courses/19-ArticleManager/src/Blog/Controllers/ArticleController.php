<?php
namespace Blog\Controllers;


use Blog\Controllers\Contracts\AbstractController;
use Blog\Models\Articles\Article;
use Framework\Exceptions\NotFoundException;
use Framework\Exceptions\UnauthorizedException;


/**
 * Class ArticleController
 * @package Blog\Controllers
 */
class ArticleController extends AbstractController
{

    /**
     * @url 'http://localhost:8888/articles/1'
     * @url 'http://localhost:8888/articles/2'
     * @param int $articleId
     * @return string
     * @throws NotFoundException
    */
    public function view(int $articleId)
    {
        $article = Article::getById($articleId);

        if($article === null)
        {
            /* $this->view->renderHtml('blog/errors/404.php', [], 404); */
            throw new NotFoundException();
        }

        $this->view->renderHtml('blog/articles/view.php', [
            'article' => $article
        ]);

    }


    /**
     * Add new article
     * @url 'http://localhost:8888/articles/add'
     * @return void
     * @throws UnauthorizedException
     * @throws \Framework\Exceptions\Database\DbException
     * @throws \Framework\Exceptions\InvalidArgumentException
    */
    public function add(): void
    {
        // если пользователь авторизован
        if($this->user === null)
        {
            throw new UnauthorizedException();
        }

        // Create new article if user is logged
        if(!empty($_POST))
        {
            try {

                $article = Article::createFromArray($_POST, $this->user);

            }catch(InvalidArgumentException $e) {

                $this->view->renderHtml('blog/articles/add.php', ['error' => $e->getMessage()]);
                return;
            }

            header('Location: /articles/' . $article->getId(), true, 302);
            exit();
        }

        $this->view->renderHtml('blog/articles/add.php');
        return;
    }


    /**
     * Edit article by id
     * @url 'http://localhost:8888/articles/1/edit'
     * @url 'http://localhost:8888/articles/2/edit'
     * @param int $articleId
     * @return void
     * @throws NotFoundException
     * @throws \Framework\Exceptions\Database\DbException
     * @throws UnauthorizedException
     */
    public function edit(int $articleId): void
    {
        $article = Article::getById($articleId);

        if ($article === null) {
            throw new NotFoundException();
        }

        if ($this->user === null) {
            throw new UnauthorizedException();
        }

        if (!empty($_POST)) {
            try {

                $article->updateFromArray($_POST);

            } catch (InvalidArgumentException $e) {

                $this->view->renderHtml('blog/articles/edit.php', ['error' => $e->getMessage(), 'article' => $article]);
                return;
            }

            header('Location: /articles/' . $article->getId(), true, 302);
            exit();
        }

        $this->view->renderHtml('blog/articles/edit.php', ['article' => $article]);
    }


}