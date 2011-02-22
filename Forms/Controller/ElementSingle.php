<?php
class Forms_Controller_ElementSingle extends Forms_Controller_Element {
    public function  __construct($name) {
        $this->setName($name);
    }

    public function init() {
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
