<?php

/**
 * Class C
 */
class C
{
    /**
     * @var int
    */
    public static $x;

    /**
     * @return int
     */
    public function getX()
    {
        return self::$x;
    }
}

/*
C::$x = 5;
$c = new C();
dump($c->getX()); 5
*/

