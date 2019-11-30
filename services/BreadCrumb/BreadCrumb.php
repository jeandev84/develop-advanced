<?php
namespace BreadCrumb;


/**
 * Class BreadCrumb
 * @package BreadCrumb
*/
class BreadCrumb
{

    /** @var string */
    private $breadcrumb;

    /** @var string  */
    private $separator = ' / ';

    /** @var string  */
    private $domain = 'https://ddmseo.com';


    /**
     * @param $array
     * @return string
    */
    public function build($array)
    {
        $breadcrumbs = array_merge(array('home' => ''), $array);

        $count = 0;

        foreach($breadcrumbs as $title => $link) {
            $this->breadcrumb .= '
         <span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
            <a href="'.$this->domain. '/'.$link.'" itemprop="url">
               <span itemprop="title">'.$title.'</span>
            </a>
         </span>';

            $count++;

            if($count !== count($breadcrumbs)) {
                $this->breadcrumb .= $this->separator;
            }
        }
        return $this->breadcrumb;
    }
}

/**
 * Testing
*/

$breadcrumb = new breadcrumb();

echo $breadcrumb->build(array(
    'Development' => 'development',
    'PHP Breadcrumb' => 'php-breadcrumb.html'
));

/*
Home / Development / PHP Breadcrumb // the HTML output with links
*/