<?php
namespace Blog\Models\Users;


use Framework\Services\ActiveRecord\ActiveRecordEntity;

/**
 * Class User
 * @package Blog\Models\Users
 */
class User extends ActiveRecordEntity
{

    /** @var string */
    protected $nickname;


    /** @var string */
    protected $email;


    /** @var int */
    protected $isConfirmed;


    /** @var string */
    protected $role;


    /** @var string */
    protected $passwordHash;


    /** @var string */
    protected $authToken;


    /** @var string */
    protected $createdAt;


    /**
     * @return string
    */
    public function getEmail(): string
    {
        return $this->email;
    }


    /**
     * @return string
     */
    public function getNickname(): string
    {
        return $this->nickname;
    }

    /**
     * @return string
    */
    protected static function getTableName(): string
    {
         return 'users';
    }
}