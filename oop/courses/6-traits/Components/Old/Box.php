<?php

/**
 * Class Box
 */
class Box
{
    /**
     * @return string
     */
    public function sayYourClass(): string 
    {
        // return 'My class is Box';
        return 'My class is ' . self::class;
    }
}