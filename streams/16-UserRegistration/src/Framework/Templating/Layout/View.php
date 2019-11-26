<?php
namespace Framework\Templating\Layout;


/**
 * Class View
 * @package Framework\Templating\Layout
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
     * @return false|string
     */
    public function renderHtmlWithLayout(string $templateName, array $vars = [], int $code = 200)
    {
        http_response_code($code);
        extract($vars);

        $buffer = null;
        ob_start();
        include $this->templatePath . '/' . $templateName;
        if($this->layout !== '')
        {
            $content = ob_get_contents();
            include $this->templatePath . '/' . $this->layout;
        }

        /* return ob_get_clean(); */
        echo ob_get_clean();
    }


    /**
     * @param string $layout
    */
    public function setLayout(string $layout)
    {
           $this->layout = $layout;
    }

    /**
     * @return string|null
    */
    public function getLayout(): ?string
    {
        return $this->layout;
    }

}