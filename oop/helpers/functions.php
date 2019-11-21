<?php

/**
 * @return string
 */
function style()
{
   return 'style="color:#84a;"';
}

/**
 * @param $arr
 * @param bool $die
 */
function debug($arr, $die = false)
{
    echo sprintf('<pre %s>', style());
    print_r($arr);
    echo '</pre>';
    if($die) die;
}


/**
 * @param $arr
 * @param bool $die
 */
function dump($arr, $die = false)
{
    echo sprintf('<pre %s>', style());
    var_dump($arr);
    echo '</pre>';
    if($die) die;
}

/**
 * @param $arr
 */
function dd($arr)
{
   return dump($arr, true);
}