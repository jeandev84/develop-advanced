<?php
namespace Framework\Services\Database;


use PDO;


/**
 * Class Db
 * @package Framework\Services\Database
*/
class Db
{
    /** @var \PDO */
    private $pdo;


    /**
     * Db constructor.
    */
    public function __construct()
    {
        $dbOptions = (require __DIR__ . '/../../../settings.php')['db'];

        $this->pdo = new PDO(
            'mysql:host=' . $dbOptions['host'] . ';dbname=' . $dbOptions['dbname'],
            $dbOptions['user'],
            $dbOptions['password']
        );

        $this->pdo->exec('SET NAMES UTF8');
    }


    /**
     * Excecute SQL Query
     *
     * @param string $sql
     * @param array $params
     * @param string $className
     * @return array|null
     */
    public function query(string $sql, $params = [], string $className = 'stdClass'): ?array
    {
        $sth = $this->pdo->prepare($sql);
        $result = $sth->execute($params);

        if (false === $result) {
            return null;
        }

        return $sth->fetchAll(PDO::FETCH_CLASS, $className);
    }


    /**
     * @param array $config
    */
    /*
    public function setPDO(array $config)
    {
        $dbOptions = $config ?? (require __DIR__ . '/../../settings.php')['db'];

        $this->pdo = new \PDO(
            'mysql:host=' . $dbOptions['host'] . ';dbname=' . $dbOptions['dbname'],
            $dbOptions['user'],
            $dbOptions['password']
        );

        $this->pdo->exec('SET NAMES UTF8');
    }
    */
}