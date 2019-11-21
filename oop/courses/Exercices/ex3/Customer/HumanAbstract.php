<?php

/**
 * Class HumanAbstract
 */
abstract class HumanAbstract
{
    /**
     * @var string
    */
    private $name;

    /**
     * HumanAbstract constructor.
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

    /**
     * @return string
    */
    abstract public function getGreetings(): string;

    /**
     * @return string
     */
    abstract public function getMyNameIs(): string;


    /**
     * @return string
    */
    public function introduceYourself(): string
    {
        return $this->getGreetings() . '! ' . $this->getMyNameIs() . ' ' . $this->getName() . '.';
    }
}