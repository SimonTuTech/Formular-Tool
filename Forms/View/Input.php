<?php
//creates an input-field
class Forms_View_Input extends _Forms_View {
    public function  errorMessage() {
        return "Dies ist leider kein gültiger Wert für ein Input-Feld";
    }

    public function  __toString() {
        return sprintf(
                '<input type="text" name="%s" value="%s" class="%s">'
                ,$this->controller->getName()
                ,$this->controller->getValue()
                ,"field-".$this->controller->getName()." type-input"
               );
    }
}
?>
