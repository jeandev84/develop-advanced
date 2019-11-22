<?php
namespace Project;

/**
 * Class Autoloader
 * @package Project
 */
class Autoloader
{
     /** @var string */
     private static $root;

    /**
     * @param string $root
     * @return Autoloader
     */
     public static function location(string $root)
     {
          self::$root = $root;
          return new static();
     }

    /**
     * Register classe
     */
     public function register()
     {
          spl_autoload_register(__CLASS__.'::load');
     }

     /**
      * @param string $className
     */
     private static function load(string $className)
     {
          $filePath = self::normalisePath(self::$root . $className . '.php');
          if(! file_exists($filePath))
          {
             die(sprintf('File (%s) does not exist', $filePath));
          }
          require_once $filePath;
     }

    /**
     * @param string $path
     * @return string
     */
     private static function normalisePath(string $path)
     {
         return str_replace(['\\', '/'], DIRECTORY_SEPARATOR, $path) ;
     }
}