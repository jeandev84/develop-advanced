<?php


/**
 * Class Cat
*/
class Cat
{

    /**
     * @var string
     */
    private $name;


    /**
     * Cat constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}