<?php

/**
 * Can't be instanciated
 * Class AbstractClass
 */
abstract class AbstractClass
{
    /**
     * @return mixed
     */
    abstract public function getValue();


    /**
     * Print value
     * @return string
    */
    public function printValue()
    {
        echo 'Значение: ' . $this->getValue();
    }
}

