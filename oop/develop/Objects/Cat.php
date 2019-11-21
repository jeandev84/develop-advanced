<?php

/**
 * Class = Maket, Entity (чертёж)
 * Class Cat
 */
class Cat
{
    /* Properties */
    private $name;
    public $color;
    public $weight;

    /**
     * Cat constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /* Methods */
    public function sayHello()
    {
        return 'Привет! Меня зовут '. $this->name . '.';
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

echo '<h2>Object & Class</h2>';
$cat1 = new Cat('Снежок ');
echo $cat1->sayHello();
echo '<br>';

