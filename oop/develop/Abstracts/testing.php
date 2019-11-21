<?php

require ROOT .'/develop/Abstracts/Customer/AbstractClass.php';
require ROOT .'/develop/Abstracts/Children/ClassA.php';

$objectA = new ClassA('kek');
$objectA->printValue();