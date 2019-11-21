<?php

/**
 * Class FrenchHuman
 */
class FrenchHuman extends HumanAbstract
{

    /**
     * @return string
     */
    public function getGreetings(): string
    {
         return 'Salut! ';
    }

    /**
     * @return string
     */
    public function getMyNameIs(): string
    {
        return 'Je suis ';
    }
}