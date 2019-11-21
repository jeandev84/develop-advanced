<?php

/**
 * Class Post
 */
class Post
{
    
   protected $title;
   protected $text;

    /**
     * Post constructor.
     * @param string $title
     * @param string $text 
   */
   public function __construct(string $title, string $text)
   {
       $this->title = $title;
       $this->text  = $text;
   }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return void
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
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
     * @return void
     */
    public function setText(string $text): void
    {
        $this->text = $text;
    }
    
}