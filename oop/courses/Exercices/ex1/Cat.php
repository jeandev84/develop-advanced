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
     * @param string $color
     * @param string $weight
     */
    public function __construct(string $name, string $color, string $weight)
    {
        $this->name = $name;
        $this->color = $color;
        $this->weight = $weight;
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

    /**
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * @param string $color
     */
    public function setColor(string $color): void
    {
        $this->color = $color;
    }

    /**
     * @return string
     */
    public function getWeight(): string
    {
        return $this->weight;
    }

    /**
     * @param string $weight
     */
    public function setWeight(string $weight): void
    {
        $this->weight = $weight;
    }
}

$cat1 = new Cat('Снежок ', 'Белый', 50);
echo $cat1->sayHello();
echo '<br>';

