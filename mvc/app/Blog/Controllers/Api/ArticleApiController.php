<?php
namespace App\Blog\Controllers\Api;


use App\Blog\Controllers\Contracts\AbstractController;
use App\Blog\Models\Articles\Article;
use App\Blog\Models\Users\User;
use Framework\Exceptions\NotFoundException;


/**
 * Class ArticlesApiController
 * @package App\Blog\Controllers\Api
*/
class ArticleApiController extends AbstractController
{

    /**
     * http://localhost:8999/api/articles/{articleId}
     * Example:
     *   http://localhost:8999/api/articles/1
     * @param int $articleId
     * @throws \Framework\Exceptions\Database\DbException
     * @throws NotFoundException
    */
    public function view(int $articleId)
    {
        $article = Article::getById($articleId);

        if ($article === null) {
            throw new NotFoundException();
        }

        $this->view->displayJson([
            'articles' => [$article]
        ]);
    }


    /**
     * http://localhost:8999/api/articles/add
    */
    public function add()
    {
        $input = $this->getInputData();  /* debug($input, true); */
        $articleFromRequest = $input['articles'][0];

        $authorId = $articleFromRequest['author_id'];
        $author = User::getById($authorId);

        $article = Article::createFromArray($articleFromRequest, $author);
        $article->save();

        header('Location: /api/articles/' . $article->getId(), true, 302);
    }


    /**
     * http://localhost:8999/api/articles/{articleId}/edit
     * @param int $articleId
     * @return false|string
    */
    public function edit(int $articleId)
    {
        $article = Article::getById($articleId);

        if(! $article)
        {
            return json_encode(['message' => 'Object not found']);
        }

        return json_encode($article);
    }


    /**
     * http://localhost:8999/api/articles/{articleId}/delete
     * Delete article
     * @param int $articleId
     * @return null
    */
    public function delete(int $articleId)
    {
         /* $article = Article::getById($articleId); */
         $article = Article::getById($articleId);

         if($article instanceof Article)
         {
             if(! method_exists($article, 'getId'))
             {
                  return false;
             }
             call_user_func([$article, 'getId']);
         }
    }


    /**
     * Get contract
     * @param int $id
     * @return // JsonResponse
     */
    public function show(int $id)
    {
         $article = Article::getById($id);

         if(! $article)
         {
              // return new JsonResponse(['message' => 'Object not found!']);
         }

         // $this->view->displayJson($article);
    }
}