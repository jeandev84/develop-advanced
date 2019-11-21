<?php

require ROOT .'/develop/Interfaces/Contracts/CalculateSquare.php';
require ROOT .'/develop/Interfaces/Figures/Rectangle.php';
require ROOT .'/develop/Interfaces/Figures/Square.php';
require ROOT .'/develop/Interfaces/Figures/Circle.php';


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