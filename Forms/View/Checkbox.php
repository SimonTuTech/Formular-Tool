<?php
//creates a single checkbox or checkbox-group
class Forms_View_Checkbox extends _Forms_View {
     public function  errorMessage() {
        return "Checkbox Error";
    }

    public function  __toString() {
        foreach ($this->controller->getOptions() as $option) {
            if ($this->controller->is_selected($option)) {
                $checked = 'checked="checked"';
            }
            else {
                $checked = "";
            }

            //wenn Post-Var und Session-Var für dieses Element nicht gesetzt(=erster Aufruf) und option in array mit default-Werten steht, wird default gesetzt
            if ($this->controller->getDefault() !== NULL && in_array($option, $this->controller->getDefault())) {
                $checked = 'checked="checked"';
            }

            $checkbox .=
                sprintf( //TODO: id-Erzeugung ist noch nicht optimal wg. umlauten+sonderzeichen
                    '<input type="hidden" name="%s[%s]"><input type="checkbox" name="%s[%s]" class="%s" id="%s" %s>'
                    ,htmlentities($this->controller->getName(), ENT_QUOTES, 'utf-8')
                    ,htmlentities($option, ENT_QUOTES, 'utf-8')
                    ,htmlentities($this->controller->getName(), ENT_QUOTES, 'utf-8')
                    ,htmlentities($option, ENT_QUOTES, 'utf-8')
                    ,"field-".htmlentities($this->controller->getName(), ENT_QUOTES, 'utf-8')." type-checkbox"
                    ,htmlentities($this->controller->getName(), ENT_QUOTES, 'utf-8')."-".htmlentities($option, ENT_QUOTES, 'utf-8')
                    ,$checked
                );

            $checkbox .=
                sprintf(
                    '<label for="%s">%s</label>'
                    ,htmlentities($this->controller->getName(), ENT_QUOTES, 'utf-8')."-".htmlentities($option, ENT_QUOTES, 'utf-8')
                    ,htmlentities($option, ENT_QUOTES, 'utf-8')
                );
        }
        return $checkbox;
    }
}
?>
