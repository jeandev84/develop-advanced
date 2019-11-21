<?php

/**
 * Class RussianHuman
 */
class RussianHuman extends HumanAbstract
{

    /**
     * @return string
     */
    public function getGreetings(): string
    {
        return 'Привет! ';
    }

    /**
     * @return string
     */
    public function getMyNameIs(): string
    {
        return 'Меня зовут ';
    }
}