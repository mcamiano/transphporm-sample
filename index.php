<?php

require 'vendor/autoload.php';

use Transphporm\Builder;

class HomePage {
    private $template;
    private $data=array();

    public function __construct($xmlTemplateFilePath, $tssTransformFilePath) 
    {
        $this->template = new Builder($xmlTemplateFilePath, $tssTransformFilePath);
    }

    public function curry($curriedParameters=array())
    {
        if (is_array($curriedParameters)) {
            $this->data = array_merge($this->data, $curriedParameters);
        } else {
            throw new \InvalidArgumentException("HomePage requires an array of simple named scalar values as parameters, something else given");
        }
    }

    public function render($overrideData=array())
    {
        $this->curry($overrideData);
        return $this->template->output((object)$this->data)->body;
    }
}

$data = array(
    'pagetitle' => "Awesome Page",
    'title'     => "Article Title",
    'subtitle'  => "By Zack",
    'fruits'    => [ (object)['name'=>'Apple'], (object)['name'=>'Pear'] ]
); 

$page = 'templates/home.xml';
$tss = 'templates/home.tss';

$template = new HomePage($page,$tss);
$template->curry($data);
echo $template->render();
