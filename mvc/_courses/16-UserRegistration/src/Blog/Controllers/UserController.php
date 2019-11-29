<?php
namespace Blog\Controllers;


use Blog\Models\Users\User;
use Framework\Exceptions\InvalidArgumentException;
use Framework\Templating\View;


/**
 * Class UserController
 * @package Blog\Controllers
*/
class UserController
{

    /** @var View */
    private $view;

    /**
     * UserController constructor.
    */
    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../../templates');
    }

    /**
     * Logic User Registration
     * @url 'http://localhost:8888/users/register'
     * @return string
     * @throws \Framework\Exceptions\InvalidArgumentException
     */
    public function signUp()
    {
        if(!empty($_POST))
        {
            try {

                $user = User::signUp($_POST);

            } catch (InvalidArgumentException $e) {

                $this->view->renderHtml('blog/users/signUp.php', ['error' => $e->getMessage()]);
                return;
            }

            if($user instanceof User)
            {
                $this->view->renderHtml('blog/users/signUpSuccessful.php');
                return;
            }
        }

        $this->view->renderHtml('blog/users/signUp.php');
    }
}