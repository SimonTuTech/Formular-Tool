<?php
//creates an input-field
class Forms_View_Input extends _Forms_View {
    public function  errorMessage() {
        return "Dies ist leider kein gültiger Wert für ein Input-Feld";
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
                '<input type="text" name="%s" value="%s" class="%s%s">%s'
                ,htmlentities($this->controller->getName(), ENT_QUOTES, 'utf-8')
                ,$value
                ,"field-".htmlentities($this->controller->getName(), ENT_QUOTES, 'utf-8')." type-input"
                ,$this->invalidClass
                ,$this->invalidMessage
               );
    }
}
?>
