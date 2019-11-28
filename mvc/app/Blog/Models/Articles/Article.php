<?php
namespace App\Blog\Models\Articles;


use App\Blog\Models\Users\User;
use Framework\Exceptions\InvalidArgumentException;
use Framework\Services\ActiveRecord\ActiveRecordEntity;



/**
 * Class Article
 * @package App\Blog\Models\Articles
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
     * @param string $name
    */
    public function setName(string $name)
    {
        $this->name = $name;
    }


    /**
     * @return string
    */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
    */
    public function setText(string $text)
    {
        $this->text = $text;
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
     * @param User $author
    */
    public function setAuthor(User $author): void
    {
        $this->authorId = $author->getId();
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
     * @param array $fields
     * @param User $author
     * @return Article
     * @throws InvalidArgumentException
     * @throws \Framework\Exceptions\Database\DbException
    */
    public static function createFromArray(array $fields, User $author): Article
    {
        if (empty($fields['name'])) {
            throw new InvalidArgumentException('Не передано название статьи');
        }

        if (empty($fields['text'])) {
            throw new InvalidArgumentException('Не передан текст статьи');
        }

        $article = new Article();

        $article->setAuthor($author);
        $article->setName($fields['name']);
        $article->setText($fields['text']);

        $article->save();

        return $article;
    }


    /**
     * @param array $fields
     * @return Article
     * @throws InvalidArgumentException
     * @throws \Framework\Exceptions\Database\DbException
    */
    public function updateFromArray(array $fields): Article
    {
        if (empty($fields['name'])) {
            throw new InvalidArgumentException('Не передано название статьи');
        }

        if (empty($fields['text'])) {
            throw new InvalidArgumentException('Не передан текст статьи');
        }

        $this->setName($fields['name']);
        $this->setText($fields['text']);

        $this->save();

        return $this;
    }


    /**
     * @return string
    */
    protected static function getTableName(): string
    {
         return 'articles';
    }

}

