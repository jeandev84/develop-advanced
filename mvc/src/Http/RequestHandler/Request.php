<?php
namespace Framework\Http\RequestHandler;

/**
 * Class Request
 * @package Framework\Http\RequestHandler
 */
class Request
{

    /** @var string */
    private $baseUrl;


    /** @var QueryParamBag [ Query Params ] */
    private $query;


    /** @var  HeaderParamBag [ Headers HTTP ] */
    private $headers;


    /** @var CookieParamBag  [ Cookie Param ] */
    private $cookies;


    /** @var ServerParamBag [ Server Params ] */
    private $server;


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
     * @param string $to
     */
    public function redirect(string $to)
    {
        if(! $to) {
            return;
        }
        header(sprintf('Location : %s', $to));
        exit;
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