<?php

require ROOT .'/develop/Abstracts/Exercices/Customer/HumanAbstract.php';
require ROOT .'/develop/Abstracts/Exercices/Humans/RussianHuman.php';
require ROOT .'/develop/Abstracts/Exercices/Humans/EnglishHuman.php';
require ROOT .'/develop/Abstracts/Exercices/Humans/FrenchHuman.php';

$russianHuman = new RussianHuman('Иван');
echo $russianHuman->introduceYourself();

echo '<hr>';

$englishHuman = new EnglishHuman('Ivan');
echo $englishHuman->introduceYourself();

echo '<hr>';

$frenchHuman = new FrenchHuman('Ivanh');
echo $frenchHuman->introduceYourself();