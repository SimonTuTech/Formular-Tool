<?php
class Forms_Model_Session implements Forms_Interface_Model {
    public function  __construct() {
        session_start();
    }

    public function getValueForKey ($key) {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : NULL;
    }

    public function setValueForKey ($key, $value) {
        $_SESSION[$key] = $value;
    }
}
?>
