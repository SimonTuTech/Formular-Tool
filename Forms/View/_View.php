<?php
abstract class _Forms_View {
    protected $controller, $invalidMessage, $invalidClass;

    public function  __construct(Forms_Controller_Element $controller) { 
        $this->controller = $controller;
    }

    public function showValidity() {
        if ($this->controller->isValid($this->controller->getValue()) == FALSE) {
            $this->invalidMessage = '<span class="field-'.htmlentities($this->controller->getName(), ENT_QUOTES, 'utf-8').'-error errormessage">'.htmlentities($this->errorMessage(), ENT_QUOTES, 'utf-8').'</span>';
            $this->invalidClass = " invalid";
        }
        else {
            $this->invalidMessage = "";
            $this->invalidClass = "";
        }
    }

    abstract public function errorMessage();

    abstract public function  __toString();
}

?>
