<?php
namespace Blog\Models\Articles\Example;


use Framework\Services\Database\Db;

/**
 * ORM (Entity Сущность)
 * Class Article (Renomme ArticleEntity)
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
     * ORM
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
     * @return Article[]
     */
    public static function findAll(): array
    {
        /*
        $db = new Db();
        return $db->query('SELECT * FROM `articles`;', [], self::class); reference a la Article::class
        return $db->query('SELECT * FROM `articles`;', [], static::class); reference a tous les heritiers de la classe
        return $db->query('SELECT * FROM `articles`;', [], Article::class);
        */

        $db = new Db();
        return $db->query('SELECT * FROM `'. static::getTableName() .'`;', [], static::class);
    }


    /**
     * @return string
     */
    private static function getTableName(): string
    {
        return 'articles';
    }


    /**
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


/*
Согласитесь, можно заменить Article::class на self::class
– и сюда автоматически подставится класс, в котором этот метод определен.
А можно заменить его и вовсе на static::class – тогда будет подставлено имя класса,
у которого этот метод был вызван.
В чём разница? Если мы создадим класс-наследник SuperArticle,
он унаследует этот метод от родителя. Если будет использоваться self:class,
то там будет значение “Article”, а если мы напишем static::class, то там уже будет значение “SuperArticle”.
Это называется поздним статическим связыванием – благодаря нему мы можем писать код,
который будет зависеть от класса, в котором он вызывается, а не в котором он описан.
*/