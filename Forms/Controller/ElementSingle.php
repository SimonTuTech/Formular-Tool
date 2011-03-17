<?php
class Forms_Controller_ElementSingle extends Forms_Controller_Element {
    public function  __construct($name, array $default) {
        $this->setName($name);
        $this->default = $default;
    }

    public function init() {
        //falls default-Wert(e) gesetzt, werden sie in Definitions-Storage geschrieben
        if (count($this->default) > 0) {
            $this->setDefault($this->default);
        }

        //schreibt Werte aus Post in Storage, wenn Post gesetzt -> über setValue
        $incomingValue = $this->inputSource->getValueForKey($this->getName());
        if ($incomingValue !== NULL) {
            $this->setValue($incomingValue);
        }
    }

    public function setValue ($incomingValue) {
        $this->storage->setValueForKey($this->getName(), $incomingValue);
    }

    public function getValue () {
        return $this->storage->getValueForKey($this->getName());
    }
}
?>
