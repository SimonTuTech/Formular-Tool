<?php
//creates a textarea
class Forms_View_TextArea extends _Forms_View {
    public function  __toString() {
        return sprintf(
                '<textarea name="%s" class="%s">%s</textarea>'
                ,//TODO: add values
               );
    }
}
?>
