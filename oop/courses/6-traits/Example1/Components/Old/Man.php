<?php

/**
 * Class Man
 */
class Man
{
   /**
    * @return string
   */
   public function sayYourClass(): string 
   {
        /* return 'My class is Man'; */
        return 'My class is ' . self::class;
   }
}