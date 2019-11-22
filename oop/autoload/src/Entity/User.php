<?php
namespace Entity;

/**
 * Class User
 * @package Entity
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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
    */
    public function setName(string $name)
    {
         $this->name = $name;
    }

    /**
     * @return string
    */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * @param string $role
    */
    public function setRole(string $role)
    {
        $this->role = $role;
    }

    /**
     * @return string
    */
    public function getGreeting()
    {
       return 'Hello! ' . $this->name . '. Are-you a ' . $this->role . ' ?';
    }
}