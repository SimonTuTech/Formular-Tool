<?php
abstract class _Forms_View {
    protected $controller, $invalidMessage, $invalidClass;

    public function  __construct(Forms_Controller_Element $controller) { 
        $this->controller = $controller;
    }

    public function showValidity() {
        if ($this->controller->isValid($this->controller->getValue()) == FALSE) {
            $this->invalidMessage = '<span class="field-'.$this->controller->getName().'-error errormessage">'.$this->errorMessage().'</span>';
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
