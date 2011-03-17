<?php
abstract class Forms_Controller_Element {
    protected $name, $inputSource, $storage, $delegate, $default;

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

    public function setDefault (array $default) {
        $this->storage->setOptionsForKey($this->getName()."default", $default);
    }

    //gibt default-Werte nur aus, wenn Post und Session noch nicht gesetzt sind
    public function getDefault () {
        if ($this->inputSource->getValueForKey($this->getName()) === NULL && $this->storage->getValueForKey($this->getName()) === NULL) {
            return $this->storage->getOptionsForKey($this->getName()."default");
        }
        else {
            return NULL;
        }
    }
}

?>