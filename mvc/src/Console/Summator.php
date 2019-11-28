<?php
namespace Framework\Console;


use Framework\Console\Contracts\AbstractCommand;
use Framework\Exceptions\Console\ConsoleException;


/**
 * Example: $ php bin/cli.php Summator -a=5 -y=3
 * Class Summator
 * @package Framework\Console
*/
class Summator extends AbstractCommand
{

    /**
     * @throws ConsoleException
     */
    protected function checkParams()
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