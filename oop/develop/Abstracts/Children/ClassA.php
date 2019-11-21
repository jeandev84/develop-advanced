<?php

/**
 * Class ClassA
 */
class ClassA extends AbstractClass
{
    /**
     * @var string
    */
    private $value;

    /**
     * ClassA constructor.
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->value = $value;
    }

    /**
     * @return mixed|string
    */
    public function getValue()
    {
        return $this->value;
    }
}