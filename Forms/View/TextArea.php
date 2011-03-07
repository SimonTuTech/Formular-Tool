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
                ,htmlentities($this->controller->getName(), ENT_QUOTES, 'utf-8')
                ,"field-".htmlentities($this->controller->getName(), ENT_QUOTES, 'utf-8')." type-textarea"
                ,$this->invalidClass
                ,htmlentities($this->controller->getValue(), ENT_QUOTES, 'utf-8')
                ,$this->invalidMessage
               );
    }
}
?>
