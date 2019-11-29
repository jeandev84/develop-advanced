<?php


/**
 * @param $a
 * @param $b
 * @return int
 */
function sum($a, $b)
{
    return $a + $b;
}

$sumReflector = new ReflectionFunction('sum');

/*
 /var/www/webshake/mvc/reflectionApi/demo.php
*/
echo $sumReflector->getFileName();
echo '<br>';

/*
 Start line 9
*/
echo $sumReflector->getStartLine();
echo '<br>';

/*
End line 12
*/
echo $sumReflector->getEndLine();
echo '<br>';

/*
Doc comment function
*/
echo $sumReflector->getDocComment();


/**
 * Get methods : $reflector->getMethods()
 * Get all constants : $reflector->getConstants()
 * Create new object : $reflector->newInstance()
 * Get methods : $reflector->newInstanceWithoutConstructor()
 *
 * @param object $instanceOfObject
 * @return array
 */
function getPropertiesNames(object $instanceOfObject)
{
    $reflector = new \ReflectionObject($instanceOfObject);
    $properties = $reflector->getProperties(); // debug($properties, true);

    $propertiesNames = [];

    foreach($properties as $property)
    {
        $propertiesNames[] = $property;
    }

    // debug($propertiesNames, true);
    return $propertiesNames;
}

