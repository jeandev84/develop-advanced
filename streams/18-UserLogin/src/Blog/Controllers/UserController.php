<?php
namespace Blog\Controllers;


use Blog\Controllers\Contracts\AbstractController;
use Blog\Services\EmailSender;
use Framework\Exceptions\InvalidArgumentException;


/**
 * Class UserController
 * @package Blog\Controllers
*/
class UserController extends AbstractController
{

    /**
     * Logic User Registration
     * @url 'http://localhost:8888/users/register'
     * @return string
     * @throws \Framework\Exceptions\InvalidArgumentException
     * @throws \Framework\Exceptions\Database\DbException
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
                $code = UserActivationService::createActivationCode($user);

                EmailSender::send($user, 'Активация', 'userActivation.php', [
                    'userId' => $user->getId(),
                    'code' => $code
                ]);


                $this->view->renderHtml('blog/users/signUpSuccessful.php');
                return;
            }
        }

        $this->view->renderHtml('blog/users/signUp.php');
    }


    /**
     * @url http://localhost:8888/users/{userId}/activate/{code}
     * Example:
     *   http://localhost:8888/users/10/activate/6bd1f0faa44c0e2ff96d34bdc04f734f
     * @param int $userId
     * @param string $activationCode
     * @throws \Framework\Exceptions\Database\DbException
     */
    public function activate(int $userId, string $activationCode)
    {
        $user = User::getById($userId);
        $isCodeValid = UserActivationService::checkActivationCode($user, $activationCode);

        if ($isCodeValid)
        {
            $user->activate();
            echo 'OK!';
        }
    }


    /**
     * Login user
     * @return void
     * @throws \Framework\Exceptions\Database\DbException
    */
    public function login()
    {
        if(! empty($_POST))
        {
            try {

                $user = User::login($_POST);
                UserAuthService::createToken($user);
                header('Location: /');
                exit();

            } catch (InvalidArgumentException $e) {

                $this->view->renderHtml('blog/users/login.php', ['error' => $e->getMessage()]);
                return;
            }
        }

        $this->view->renderHtml('blog/users/login.php');
    }
}