<?php

/**
 * Class Article
*/
class Article
{
    /**
     * @var string
    */
    private $title;

    /**
     * @var string
    */
    private $text;


    /**
     * @var User
    */
    private $author;


    /**
     * Article constructor.
     * @param string $title
     * @param string $text
     * @param User $author
     */
    public function __construct(string $title, string $text, User $author)
    {
            $this->title  = $title;
            $this->text   = $text;
            $this->author = $author;
    }


    /**
     * @return string
    */
    public function getTitle(): string
    {
        return $this->title;
    }


    /**
     * @return string
    */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @return User
    */
    public function getAuthor(): User
    {
        return $this->author;
    }
}