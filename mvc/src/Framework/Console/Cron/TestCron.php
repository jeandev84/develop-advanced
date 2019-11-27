<?php
namespace Framework\Console\Cron;


use Framework\Console\Contracts\AbstractCommand;

/**
 * Class TestCron
 * @package Framework\Console\Cron
*/
class TestCron extends AbstractCommand
{

    /**
     * @return mixed
     * @throws \Framework\Exceptions\Console\ConsoleException
    */
    protected function checkParams()
    {
        $this->ensureParamExists('x');
        $this->ensureParamExists('y');
    }

    /**
     * @return mixed
    */
    public function execute()
    {
        /* чтобы проверить работу скрипта, будем записывать в файлик 1.log текущую дату и время */
        /* file_put_contents('C:\\1.log', date(DATE_ISO8601) . PHP_EOL, FILE_APPEND); */
        file_put_contents(__DIR__.'/../../temp/error.log', date('Y-m-d H:i:s') . PHP_EOL, FILE_APPEND);
    }
}