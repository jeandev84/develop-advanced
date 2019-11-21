<?php

/**
 * Trait SayYourClassTrait
 */
trait SayYourClassTrait
{
   /**
     * @return string
   */
   public function sayYourClass(): string 
   {
       return 'My class is ' . self::class;
   }
}