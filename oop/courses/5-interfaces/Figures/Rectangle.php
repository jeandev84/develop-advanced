<?php

/**
 * Class Rectangle
 */
class Rectangle implements CalculateSquare
{
    private $x;
    private $y;

    /**
     * Rectangle constructor.
     * @param float $x
     * @param float $y
     */
    public function __construct(float $x, float $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * Calcul Square
     * @return float
     */
    public function calculateSquare(): float
    {
        return $this->x * $this->y;
    }
}