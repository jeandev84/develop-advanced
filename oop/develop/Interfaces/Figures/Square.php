<?php

/**
 * Class Square
 */
class Square implements CalculateSquare
{
    /**
     * @var float 
     */
    private $x;

    /**
     * Square constructor.
     * @param float $x
     */
    public function __construct(float $x)
    {
        $this->x = $x;
    }

    /**
     * Calcule Square
     * @return float
     */
    public function calculateSquare(): float
    {
        return $this->x ** 2;
    }
}