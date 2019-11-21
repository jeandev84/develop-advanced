<?php

/**
 * Class A
 */
class A
{
    /**
     * @param int $x
     * @return string
    */
    public static function test(int $x)
    {
        return 'x = '. $x;
    }
}

// echo A::test(5);