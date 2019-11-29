<?php
namespace App\Blog\Controllers\Contracts;

use App\Blog\Models\Users\User;
use App\Blog\Services\UserAuthService;
use Framework\Templating\View;


/**
 * Class AbstractController
 * @package Blog\Controllers\Contracts
*/
abstract class AbstractController
{

    /** @var View */
    protected $view;

    /** @var User|null */
    protected $user;

    /**
     * AbstractController constructor.
    */
    public function __construct()
    {
        $this->user = UserAuthService::getUserByToken();
        $this->view = new View(__DIR__ . '/../../../../templates');
        $this->view->setVar('user', $this->user);
    }


    /**
     * @return mixed
    */
    protected function getInputData()
    {
        return json_decode(
            file_get_contents('php://input'),
            true
        );
    }
}
