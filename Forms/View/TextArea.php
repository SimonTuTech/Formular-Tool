<?php
//creates a textarea
class Forms_View_TextArea extends _Forms_View {
     public function  errorMessage() {
        return "Dies ist leider kein gültiger Wert für eine Textarea";
    }

    public function  __toString() {
        $this->showValidity();

        return sprintf(
                '<textarea name="%s" class="%s%s">%s</textarea>%s'
                ,$this->controller->getName()
                ,"field-".$this->controller->getName()." type-input"
                ,$this->invalidClass
                ,$this->controller->getValue()
                ,$this->invalidMessage
               );
    }
}
?>
