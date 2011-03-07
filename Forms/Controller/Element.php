<?php
abstract class Forms_Controller_Element {
    protected $name, $inputSource, $storage, $delegate;

    public function setInputSource (Forms_Interface_InputSource $source) {
        $this->inputSource = $source;
    }

    public function setStorage ($storage) {
        $this->storage = $storage;
    }

    public function setDelegate ($delegate) {
        $this->delegate = $delegate;
    }

    public function isValid ($value) {
        if (!empty($this->delegate) && $this->delegate instanceof Forms_Interface_Validator) {
            return $this->delegate->validateValue($value);
        }
        else {
            return TRUE;
        }
    }

    /**
     * Writes incoming values to storage
     */
    abstract function init();

    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }
}

?>