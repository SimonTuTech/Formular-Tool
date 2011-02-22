<?php
//creates a single checkbox or checkbox-group
class Forms_View_Checkbox extends _Forms_View {
    public function  __toString() {
        foreach ($this->options as $option) {
            if (is_array($this->value) && in_array($option, $this->value)) {
                $checked = 'checked="checked"';
            }
            else {
                $checked = "";
            }
            //TODO: add valid everything
            $checkboxes .=
            sprintf(
            '<input type="checkbox" name="%s[]" value="%s" class="%s" %s>'
            ,htmlentities($this->name, ENT_QUOTES, 'utf-8')
            ,htmlentities($option, ENT_QUOTES, 'utf-8')
            ,htmlentities($this->design, ENT_QUOTES, 'utf-8')
            ,$checked
           );
        }
        var_dump($this->value);
        return $checkboxes;
    }
}
?>
