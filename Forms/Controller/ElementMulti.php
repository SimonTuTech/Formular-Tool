<?php
class Forms_Controller_ElementMulti extends Forms_Controller_Element {
    protected $options;

    public function  __construct($name, array $options) {
        $this->setName($name);
        $this->options = $options;
    }

    public function  init() {
        //muss Werte setzen aus Post -> über setSelected
        $incomingValues = $this->inputSource->getValueForKey($this->getName());
        if (is_array($incomingValues) && count($incomingValues) > 0 ) {
            $this->setValue($incomingValues);
        }
        //muss Optionen setzen, die von der Factory (oder hier direkt) reinkommen -> über setOptions
        $this->setOptions($this->options);
    }

    public function setOptions (array $options) {
        $this->storage->setOptionsForKey($this->getName(), $options);
    }

    public function getOptions () {
        return $this->storage->getOptionsForKey($this->getName());
    }

     public function setSelected ($incomingArray) {
        //schreibt die angewählten Werte in Session
        $this->storage->setValueForKey($this->getName(), $incomingArray);
    }

    public function is_selected ($option) {
        //vergleicht ob $option in der Session (=ausgewählte Options) steht und gibt TRUE zurück, sonst FALSE
        if (in_array($option, $this->storage->getValueForKey($this->name))) {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }
}
?>
