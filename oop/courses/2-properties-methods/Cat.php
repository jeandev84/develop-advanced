<?php

/**
 * Class = Maket, Entity (чертёж)
 * Class Cat
 */
class Cat
{
    /* Properties */
    private $name; # Incapsulation
    public $color;
    public $weight;

    /* Methods */
    public function sayHello()
    {
        echo 'Привет! Меня зовут '. $this->name . '.';
        echo '<br>';
    }

    /**
     * @param $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}

$cat1 = new Cat();
$cat1->setName('Снежок');
$cat1->color = 'white';
$cat1->weight = 3.5;
$cat1->sayHello();


$cat2 = new Cat();
$cat2->setName('Барсик');
$cat2->color = 'black';
$cat2->weight = 6.2;
$cat2->sayHello();

