<?php
namespace Framework\Http;

/**
 * Class Request
 * @package Framework\Http
 */
class Request
{

     /**
      * Get Path of URL
      * @return string
     */
     public function getPath()
     {
         return trim(
             parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
         , '/');
     }

    /**
     * @return mixed|null
     */
     public function method()
     {
         return $this->server('REQUEST_METHOD');
     }


     /**
      * @param string $key
      * @return mixed|null
     */
     public function get(string $key)
     {
         return $this->getArgument($_GET, $key);
     }


     /**
      * @param string $key
      * @return mixed|null
     */
     public function post(string $key)
     {
         return $this->getArgument($_POST, $key);
     }


     /**
      * @param string $key
      * @return mixed|null
     */
     public function server(string $key)
     {
         return $this->getArgument($_SERVER, $key);
     }

     /**
     * @param array $data
     * @param string $key
     * @param null $default
     * @return mixed|null
     */
     private function getArgument(array $data, string $key, $default = null)
     {
         return isset($data[$key]) ? $data[$key] : $default;
     }
}