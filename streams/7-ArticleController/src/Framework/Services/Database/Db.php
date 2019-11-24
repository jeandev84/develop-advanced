<?php
namespace Framework\Services\Database;


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

        $this->pdo = new \PDO(
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
     * @return array|null
    */
    public function query(string $sql, $params = []): ?array
    {
        $sth = $this->pdo->prepare($sql);
        $result = $sth->execute($params);

        if (false === $result) {
            return null;
        }

        return $sth->fetchAll();
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