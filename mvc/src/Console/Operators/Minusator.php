<?php
namespace Framework\Console\Operators;


use Framework\Console\Contracts\AbstractCommand;
use Framework\Exceptions\Console\ConsoleException;


/**
 * $ php bin/cli.php Minusator -x=15 -y=10
 * Class Minusator
 * @package Framework\Console\Operators
 */
class Minusator extends AbstractCommand
{

    /**
     * @throws ConsoleException
     */
    protected function checkParams()
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