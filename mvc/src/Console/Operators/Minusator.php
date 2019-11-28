<?php
namespace Framework\Console\Operators;


use Blog\Controllers\Contracts\AbstractController;
use Framework\Exceptions\Console\ConsoleException;


/**
 * $ php bin/cli.php Minusator -x=15 -y=10
 * Class Minusator
 * @package Framework\Console\Operators
 */
class Minusator extends AbstractController
{

    /**
     * @throws ConsoleException
     */
    private function checkParams()
    {
        $this->ensureParamExists('x');
        $this->ensureParamExists('y');
    }


    /**
     * Excecute operation
    */
    public function execute()
    {
        echo $this->getParam('x') - $this->getParam('y') . "\n";
    }
}