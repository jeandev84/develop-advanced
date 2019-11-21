<?php

/**
 * Class Human
 */
class Human
{
   private static $count = 0;

    /**
     * Human constructor.
     * при создании объект Human
     * self::$count будет увеличиваться
     */
   public function __construct()
   {
       self::$count++;
   }

    /**
    * @return int
   */
   public static function getCount()
   {
      return self::$count;
   }
}

/*
$human = new Human();
echo 'Людей уже ' . Human::getCount(); 0
*/

$human1 = new Human();
$human2 = new Human();
$human3 = new Human();

echo 'Людей уже ' . Human::getCount(); // 0