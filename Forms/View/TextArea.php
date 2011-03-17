<?php
//creates a textarea
class Forms_View_TextArea extends _Forms_View {
     public function  errorMessage() {
        return "Dies ist leider kein gültiger Wert für eine Textarea";
    }

    public function  __toString() {
        $this->showValidity();

        //wenn Post-Var und Session-Var für dieses Element nicht gesetzt(=erster Aufruf) wird default gesetzt
        if ($this->controller->getDefault() !== NULL ) {
            $default = $this->controller->getDefault();
            $value = $default[0];
        }
        else {
            $value = htmlentities($this->controller->getValue(), ENT_QUOTES, 'utf-8');
        }

        return sprintf(
                '<textarea name="%s" class="%s%s">%s</textarea>%s'
                ,htmlentities($this->controller->getName(), ENT_QUOTES, 'utf-8')
                ,"field-".htmlentities($this->controller->getName(), ENT_QUOTES, 'utf-8')." type-textarea"
                ,$this->invalidClass
                ,$value
                ,$this->invalidMessage
               );
    }
}
?>
