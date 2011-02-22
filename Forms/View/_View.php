<?php
abstract class _Forms_View {
    protected $controller;

    public function  __construct(Forms_Controller_Element $controller) { 
        $this->controller = $controller;
    }

    abstract public function errorMessage();

    abstract public function  __toString();
}

?>
