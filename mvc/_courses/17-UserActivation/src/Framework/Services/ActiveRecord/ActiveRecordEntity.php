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
     * @throws \Framework\Exceptions\Database\DbException
     */
    public static function findAll(): array
    {
        $db = Db::getInstance();
        return $db->query('SELECT * FROM `'. static::getTableName() .'`;', [], static::class);
    }


    /**
     * Find one record by column name
     * @param string $columnName
     * @param $value
     * @return static|null
     * @throws \Framework\Exceptions\Database\DbException
    */
    public static function findOneByColumn(string $columnName, $value): ?self
    {
        $db = Db::getInstance();
        $result = $db->query(
            'SELECT * FROM `' . static::getTableName() . '` WHERE `' . $columnName . '` = :value LIMIT 1;',
            [':value' => $value],
            static::class
        );
        if ($result === []) {
            return null;
        }
        return $result[0];
    }


    /**
     * @param int $id
     * @return static|null
     * @throws \Framework\Exceptions\Database\DbException
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
     * Insert/Update data in to Database
     * Example:
     * UPDATE `articles`
     * SET `id`=1,`author_id`=1,`name`='Новое название статьи',`text`='Новый текст статьи',`created_at`='2018-06-26 22:06:21'
     * WHERE id = 1
     *
     * @return void
     * @throws \Framework\Exceptions\Database\DbException
     */
    public function save(): void
    {
        $mappedProperties = $this->mapPropertiesToDbFormat();
        /* debug($mappedProperties); */

        if($this->id !== null)
        {
            $this->update($mappedProperties);

        }else{

            $this->insert($mappedProperties);
        }
    }

    /**
     * Update existed record
     * здесь мы обновляем существующую запись в базе
     * @param array $mappedProperties
     * @return void
     * @throws \Framework\Exceptions\Database\DbException
     */
    private function update(array $mappedProperties): void
    {
        $columns2params = [];
        $params2values = [];
        $index = 1;

        foreach($mappedProperties as $column => $value)
        {
            $param = ':param' . $index; // :param1
            $columns2params[] = $column . ' = ' . $param; // column1 = :param1
            $params2values[':param' . $index] = $value; // [:param1 => value1]
            $index++;
        }

        /*  debug($columns2params); */
        $sql = 'UPDATE ' . static::getTableName() . ' SET ' . implode(', ', $columns2params) . ' WHERE id = ' . $this->id;
        $db = Db::getInstance();
        $db->query($sql, $params2values, static::class);
    }


    /**
     * Insert in to database new record
     * здесь мы создаём новую запись в базе
     * array_filter() selectionne uniquement les champs qui ont ete definis
     * si un champ est vide alors array_filter l'ignore
     *
     * Debug:
     *  debug($mappedProperties);
     *  $filteredProperties = array_filter($mappedProperties);
     *  debug($filteredProperties);
     *
     * @param array $mappedProperties
     * @return void
     * @throws \Framework\Exceptions\Database\DbException
     */
    private function insert(array $mappedProperties): void
    {
        $filteredProperties = array_filter($mappedProperties);

        $columns = [];
        $paramsNames = [];
        $params2values = [];

        foreach($filteredProperties as $columnName => $value)
        {
            $columns[] = '`' . $columnName. '`';
            $paramName = ':' . $columnName;
            $paramsNames[] = $paramName;
            $params2values[$paramName] = $value;
        }

        $columnsViaSemicolon = implode(', ', $columns);
        $paramsNamesViaSemicolon = implode(', ', $paramsNames);

        $sql = 'INSERT INTO ' . static::getTableName() . ' (' . $columnsViaSemicolon . ') VALUES (' . $paramsNamesViaSemicolon . ');';

        $db = Db::getInstance();
        $db->query($sql, $params2values, static::class);
        $this->id = $db->getLastInsertId();
    }


    /**
     * Delete one record by id into database
     * @return void
     * @throws \Framework\Exceptions\Database\DbException
     */
    public function delete(): void
    {
        $db = Db::getInstance();
        $db->query('DELETE FROM `' . static::getTableName() . '` WHERE id = :id',
            [':id' => $this->id]
        );
        $this->id = null;
    }

    /**
     * Map properties called class and return them in array format
     *
     * [
     *  'название_свойства1' => значение свойства1,
     *  'название_свойства2' => значение свойства2
     * ]
     *
     * @return array
    */
    private function mapPropertiesToDbFormat(): array
    {
        $reflector = new \ReflectionObject($this);
        $properties = $reflector->getProperties();

        $mappedProperties = [];
        foreach ($properties as $property)
        {
            $propertyName = $property->getName();
            $propertyNameAsUnderscore = $this->camelCaseToUnderscore($propertyName);
            $mappedProperties[$propertyNameAsUnderscore] = $this->$propertyName;
        }

        return $mappedProperties;
    }


    /**
     * Example:
     * Transform authorId to author_id
     *
     * @param string $source
     * @return string
    */
    private function camelCaseToUnderscore(string $source): string
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $source));
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

/*
Получаем имена свойств объекта с помощью рефлексии, например, authorId
Преобразовываем это значение из camelCase в строку_с_подчеркушками, например, author_id – именно так называется поле в базе данных
Составляем результирующий запрос на обновление записи в базе данных.
*/

/*
debug($sql);
debug($params2values);
UPDATE articles SET name = :param1, text = :param2, author_id = :param3, created_at = :param4, id = :param5 WHERE id = 1
Array
(
    [:param1] => Новое название статьи
    [:param2] => Новый текст статьи
    [:param3] => 1
    [:param4] => 2019-11-23 01:41:07
    [:param5] => 1
)
*/