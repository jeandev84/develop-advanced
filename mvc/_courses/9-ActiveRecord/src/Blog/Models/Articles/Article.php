<?php
namespace Blog\Models\Articles;


use Blog\Models\Users\User;
use Framework\Services\ActiveRecord\ActiveRecordEntity;



/**
 * Class Article
 * @package Blog\Models\Articles
 */
class Article extends ActiveRecordEntity
{

    /** @var string */
    protected $name;


    /** @var string */
    protected $text;


    /** @var string */
    protected $authorId;


    /** @var string */
    protected $createdAt;



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
     * Get id current author
     * @return int
    */
    public function getAuthorId(): int
    {
        return (int) $this->authorId;
    }


    /**
     * Get current author
     * @return User
    */
    public function getAuthor(): User
    {
        return User::getById($this->authorId);
    }


    /**
     * @return string
    */
    protected static function getTableName(): string
    {
         return 'articles';
    }

}

