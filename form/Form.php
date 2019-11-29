<?php
namespace Framework;


/**
 * Class Form
 * @package Framework
*/
class Form
{

    /** @var array */
    private $data;

    /**
     * Form constructor.
     * @param array $data
    */
    public function __construct(array $data)
    {
        $this->data = $data;
    }
}