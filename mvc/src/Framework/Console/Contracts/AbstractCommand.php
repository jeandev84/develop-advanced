<?php
namespace Framework\Console\Contracts;


use Framework\Exceptions\Console\ConsoleException;


/**
 * Class AbstractCommand
 * @package Framework\Console\Contracts
*/
abstract class AbstractCommand
{

    /** @var array */
    private $params;


    /**
     * Summator constructor.
     * @param array $params
    */
    public function __construct(array $params)
    {
        $this->params = $params;
    }

    /**
     * @return mixed
    */
    abstract public function execute();

    /**
     * @return mixed
    */
    abstract protected function checkParams();


    /**
     * @param string $paramName
     * @return mixed|null
    */
    protected function getParam(string $paramName)
    {
        return $this->params[$paramName] ?? null;
    }


    /**
     * @param string $paramName
     * @throws ConsoleException
    */
    protected function ensureParamExists(string $paramName)
    {
        if (! isset($this->params[$paramName]))
        {
            $message = sprintf('Param with name "%s" is not set!', $paramName);
            throw new ConsoleException($message);
        }
    }
}