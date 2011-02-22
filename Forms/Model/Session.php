<?php
class Forms_Model_Session implements Forms_Interface_Model {
    public function  __construct() {
        session_start();
    }

    public function getValueForKey ($key) {
        if (isset ($_SESSION[$key])) {
            return $_SESSION[$key];
        }
        else {
            return NULL;
        }
    }

    public function setValueForKey ($key, $value) {
        $_SESSION[$key] = $value;
    }
}
?>
