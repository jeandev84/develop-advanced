<?php
namespace Framework\Services\ActiveRecord;


use Framework\Services\Database\Db;


/**
 * Class ActiveRecordEntity
 * @package Framework\Services\ActiveRecord
*/
abstract class ActiveRecordEntity
{

    /** @var int */
    protected $id;


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }


    /**
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        $camelCaseName = $this->underscoreToCamelCase($name);
        $this->$camelCaseName = $value;
    }


    /**
     * @return static[]
     */
    public static function findAll(): array
    {
        $db = Db::getInstance();
        return $db->query('SELECT * FROM `'. static::getTableName() .'`;', [], static::class);
    }


    /**
     * @param int $id
     * @return static|null
    */
    public static function getById(int $id): ?self
    {
        $db = Db::getInstance();
        $entities = $db->query(
            'SELECT * FROM `' . static::getTableName() . '` WHERE id=:id;',
            [':id' => $id],
            static::class
        );
        return $entities ? $entities[0] : null;
    }


    /**
     * @param string $source
     * @return string
     */
    private function underscoreToCamelCase(string $source): string
    {
        return lcfirst(str_replace('_', '', ucwords($source, '_')));
    }


    /**
     * @return string
    */
    abstract protected static function getTableName(): string;
}

/*
добавили protected-свойство ->id
и public-геттер для него – у всех наших сущностей будет id,
и нет необходимости писать это каждый раз в каждой сущности – можно просто унаследовать;
перенесли public-метод __set() – теперь все дочерние сущности будут его иметь
перенесли метод underscoreToCamelCase(), так как он используется внутри метода __set()
public-метод findAll() будет доступен во всех классах-наследниках
и, наконец, мы объявили абстрактный protected static метод getTableName(),
который должен вернуть строку – имя таблицы.
Так как метод абстрактный, то все сущности, которые будут наследоваться от этого класса, должны будут его реализовать.
Благодаря этому мы не забудем его добавить в классах-наследниках.
*/
