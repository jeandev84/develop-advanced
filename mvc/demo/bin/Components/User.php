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
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }


    /**
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }
}

$admin = new User('admin', 'Жан-Клод');
