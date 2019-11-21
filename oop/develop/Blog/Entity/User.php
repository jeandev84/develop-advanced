<?php

/**
 * Class User
*/
class User
{

   /**
     * @var string
   */
   private $name;


   /**
     * User constructor.
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