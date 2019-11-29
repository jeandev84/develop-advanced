<?php
namespace Framework\Templating;


/**
 * Class View
 * @package Framework\Templating
 */
class View
{
    /** @var string */
    private $templatePath;

    /** @var string */
    private $layout;


    /**
     * View constructor.
     * @param string $templatePath
    */
    public function __construct(string $templatePath)
    {
         $this->templatePath = $templatePath;
    }

    /**
     * Render HTML
     * @param string $templateName
     * @param array $vars
     * @param int $code
     */
    public function renderHtml(string $templateName, array $vars = [], int $code = 200)
    {
        http_response_code($code);
        extract($vars);

        ob_start();
        include $this->templatePath . '/' . $templateName;
        $buffer = ob_get_contents();
        ob_end_clean();

        echo $buffer;
    }


}