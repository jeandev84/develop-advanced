<?php 

# Example

require ROOT .'/develop/Traits/Commons/SayYourClassTrait.php';
require ROOT .'/develop/Traits/Contracts/ISayYourClass.php';
require ROOT .'/develop/Traits/Components/Man.php';
require ROOT .'/develop/Traits/Components/Box.php';



echo '<h2>Traits</h2>';
$man = new Man();
$box = new Box();

echo $man->sayYourClass();
echo '<br>';
echo $box->sayYourClass();

/*
echo Box::class; Box
echo Man::class; Max
*/