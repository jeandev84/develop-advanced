<?php
namespace Blog\Models\Articles;


/**
 * Class Article
 * @package Blog\Models\Articles
 */
class Article
{
    /** @var int */
    private $id;

    /** @var string */
    private $name;

    /** @var string */
    private $text;

    /** @var string */
    private $authorId;

    /** @var string */
    private $createdAt;


    /**
     * @param $name
     * @param $value
    */
    public function __set($name, $value)
    {
        /* echo 'Пытаюсь задать для свойства ' . $name . ' значение ' . $value . '<br>'; */
        /* $this->$name = $value; */

        $camelCaseName = $this->underscoreToCamelCase($name);
        $this->$camelCaseName = $value;
    }


    /**
     * @return int
    */
    public function getId(): int
    {
        return $this->id;
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
    public function getText(): string
    {
        return $this->text;
    }


    /**
     *
     * @param string $source
     * @return string
    */
    private function underscoreToCamelCase(string $source): string
    {
        return lcfirst(str_replace('_', '', ucwords($source, '_')));
    }
}

/*
Функция ucwords()
  делает первые буквы в словах большими, первым аргументом она принимает строку со словами,
  вторым аргументом – символ-разделитель (то, что стоит между словами). После этого строка string_with_smth преобразуется к виду String_With_Smth
Функция strreplace()
  заменяет в получившейся строке все символы ‘’ на пустую строку (то есть она просто убирает их из строки).
  После этого мы получаем строку StringWithSmth
Функция lcfirst() просто делает первую букву в строке маленькой.
  В результате получается строка stringWithSmth. И это значение возвращается этим методом.
*/