<?php
namespace Framework\Console\Operators;


use Blog\Controllers\Contracts\AbstractController;
use Framework\Exceptions\Console\ConsoleException;


/**
 * Example: $ php bin/cli.php Summator -a=5 -y=3
 * Class Summator
 * @package Framework\Console\Operators
*/
class Summator extends AbstractController
{

    /**
     * @throws ConsoleException
     */
    private function checkParams()
    {
        $this->ensureParamExists('a');
        $this->ensureParamExists('b');
    }

    /**
     * Excecute operation
    */
    public function execute()
    {
        echo $this->getParam('a') + $this->getParam('b') . "\n";
    }
}