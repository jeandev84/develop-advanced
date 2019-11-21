<?php

/**
 * Class Lesson
 */
class Lesson extends Post
{
     private $homework;

     /**
      * Lesson constructor.
      * @param string $title
      * @param string $text
      * @param string $homework
     */
     public function __construct(string $title, string $text, string $homework)
     {
         parent::__construct($title, $text);
         $this->homework = $homework;
     }

    /**
      * @return string
     */
     public function getHomework(): string
     {
        return $this->homework;
     }


    /**
     * @param string $homework
     */
    public function setHomework(string $homework): void
    {
        $this->homework = $homework;
    }
}

/*
$lesson = new Lesson('Заголовок', 'Текст', 'Домашка');
echo 'Название урока: ' . $lesson->getTitle();
*/

echo '<h2>Inheritence</h2>';
$lesson = new Lesson('Заголовок', 'Текст', 'Домашка');
dump($lesson);