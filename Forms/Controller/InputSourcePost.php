<?php

class Forms_Controller_InputSourcePost implements Forms_Interface_InputSource {
    public function getValueForKey ($key) {
        global $_POST;
        return isset($_POST[$key]) ? $_POST[$key] : NULL;
    }
}

?>
