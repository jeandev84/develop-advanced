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
     */
    public function renderHtml(string $templateName, array $vars = [])
    {
        extract($vars);

        ob_start();
        include $this->templatePath . '/' . $templateName;
        $buffer = ob_get_contents();
        ob_end_clean();

        echo $buffer;
    }


    /**
     * @param string $templateName
     * @param array $data
     * @return false|string
   */
    public function getHtmlContent(string $templateName, array $data)
    {
        extract($data);

        ob_start();
        include $this->templatePath . '/' . $templateName;
        // return ob_get_clean();
        $content = ob_get_clean();
        // echo $content;
        return $content;
    }


    /**
     * @param string $templateName
     * @param array $data
     */
    public function getContentWithLayout(string $templateName, array $data = [])
    {
        extract($data);

        $content = '';
        ob_start();
        require $this->templatePath . '/' . $templateName;
        $content = ob_get_contents();
        ob_get_clean();

        // Get Layout
        if($this->layout)
        {
            require $this->templatePath . '/' . $this->layout;
        }
    }


    /**
     * View Exception
     * @param string $templateName
     * @param array $vars
    */
    public function viewException(string $templateName, array $vars = [])
    {
        extract($vars);

        ob_start();
        include $this->templatePath . '/' . $templateName;
        $buffer = ob_get_contents();
        ob_end_clean();

        $error = 'В шаблоне была ошибка!';

        if(empty($error))
        {
            echo $buffer;
        }else{
            echo $error;
        }
    }
}