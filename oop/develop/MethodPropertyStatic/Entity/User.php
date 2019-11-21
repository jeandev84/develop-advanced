<?php

/**
 * Class User
 */
class User
{
    /**
     * @var string
    */
    private $role;

    /**
     * @var string
    */
    private $name;


    /**
     * User constructor.
     * @param string $role
     * @param string $name
    */
    public function __construct(string $role, string $name)
    {
        $this->role = $role;
        $this->name = $name;
    }

    /**
     * @param string $name
     * @return User
     */
    public static function createAdmin(string $name)
    {
        return new self('admin', $name);
    }
}

/*
$admin = new User('admin', 'Иван');
*/

/*
$admin = User::createAdmin('Иван');
dump($admin);
*/