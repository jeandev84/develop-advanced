<?php
namespace Framework\FileSystem;


/**
 * Class File
 * @package Framework\FileSystem
*/
class File
{
    /** @var string */
    private $root;

    /**
     * File constructor.
     * @param string $root
   */
    public function __construct(string $root)
    {
        $this->root = $root;
    }

    /**
     * @param string $path
     * @return bool
     */
    public function generate(string $path)
    {
        $direction = pathinfo($path)['dirname'];

        if(! is_dir($direction))
        {
            mkdir($this->root .'/' . $direction, 0777, true);
        }

        return touch($path) ? $path : false;
    }
}