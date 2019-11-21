<?php

require ROOT .'/develop/Abstracts/Common/AbstractClass.php';
require ROOT .'/develop/Abstracts/Children/ClassA.php';

$objectA = new ClassA('kek');
$objectA->printValue();