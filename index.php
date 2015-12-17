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
    'pagetitle' => "Most Awesome Page",
    'title'     => "Most Excellent Article",
    'subtitle'  => "By Mitch",
    'fruits'    => [
        (object)['name'=>'Hillary'], 
        (object)['name'=>'Bernie'], 
        (object)['name'=>'Trump'],
        (object)['name'=>'Paul'] 
    ],
    'navigation' => [
        (object)['label' => 'Home'], (object)['url' => '#'],
        (object)['label' => 'News'], (object)['url' => '#'],
        (object)['label' => 'Favorites'], (object)['url' => '#'],
        (object)['label' => 'About Us'], (object)['url' => '#'],
        (object)['label' => 'Why?'], (object)['url' => '#']
    ],
); 

// Roadblock: how to express that pages/home.xml ISA or uses simplePage.xhtml ?
$page = 'templates/layouts/simplePage.xhtml';
$tss = 'templates/bindings/home.tss';

$template = new HomePage($page,$tss);
$template->curry($data);
echo $template->render();
