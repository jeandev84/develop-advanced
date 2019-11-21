<?php

/**
 * Class EnglishHuman
 */
class EnglishHuman extends HumanAbstract
{

    /**
     * @return string
     */
    public function getGreetings(): string
    {
         return 'Hello! ';
    }


    /**
     * @return string
    */
    public function getMyNameIs(): string
    {
        return 'My name is ';
    }
}