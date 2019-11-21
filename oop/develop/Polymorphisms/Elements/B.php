<?php

/**
 * Class B
 */
class B extends A
{
   /**
     * @return string
   */
   public function sayHello()
   {
       return parent::sayHello() . '. It was joke, I am B :)';
   }
}

/*
$b = new B();
echo $b->sayHello(); Hello, I am A. It was joke, I am B :)
*/