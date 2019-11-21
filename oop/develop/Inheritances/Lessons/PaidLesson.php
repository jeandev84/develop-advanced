<?php

/**
 * Class PaidLesson
*/
class PaidLesson extends Lesson
{
    /** @var int  */
    private $price;


    /**
     * PaidLesson constructor.
     * @param string $title
     * @param string $text
     * @param string $homework
     * @param int $price
     */
    public function __construct(string $title, string $text, string $homework, int $price)
    {
         parent::__construct($title, $text, $homework);
         $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }


    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }
}

$paidLesson = new PaidLesson('Урок о наследовании в PHP', 'Лол, кек, чебурек', 'Ложитесь спать, утро вечера мудренее', 99.90);
dump($paidLesson);