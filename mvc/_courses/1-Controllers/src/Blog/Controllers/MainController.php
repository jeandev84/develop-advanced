<?php
namespace Blog\Controllers;


/**
 * Class MainController
 */
class MainController
{

     /**
      * @url '/'
      * @return string
     */
     public function main()
     {
         echo 'Главная страница';
     }


     /**
      * @url '/?name=Жан'
      * @param string $name
     */
     public function sayHello(string $name)
     {
        echo 'Привет, '. $name;
     }
}