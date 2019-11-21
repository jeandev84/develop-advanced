<?php

/**
 * Class Circle
 */
class Circle implements CalculateSquare
{

    const PI = 3.1416;
    
    /**
     * @var float 
     */
    private $r;

    /**
     * Circle constructor.
     * @param float $r
     */
    public function __construct(float $r)
    {
        $this->r = $r;
    }

    /**
     * @return float
     */
    public function calculateSquare(): float
    {
        return self::PI * ($this->r ** 2);
    }
}

echo '<h2>Interfaces</h2>';
$circle1 = new Circle(2.5);
dump($circle1 instanceof Circle); // true


$circle1 = new Circle(2.5);
dump($circle1 instanceof Rectangle); // false


$circle1 = new Circle(2.5);
dump($circle1 instanceof CalculateSquare); // true