<?php

require 'Contracts/CalculateSquare.php';
require 'Figures/Rectangle.php';
require 'Figures/Square.php';
require 'Figures/Circle.php';


# Examples

echo '<h2>Calculate Square</h2>';
$objects = [
  new Square(5),
  new Rectangle(2, 4),
  new Circle(5)
];


foreach ($objects as $object)
{
     if($object instanceof CalculateSquare)
     {
          echo 'Объект реализует интерфейс CalculateSquare. Площадь: '. $object->calculateSquare();
          echo '<br>';
     }
}