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
            $this->setSelected($incomingValues);
        }
        else {
            $this->setSelected(array());
        }

        //muss Optionen setzen, die von der Factory (oder hier direkt) reinkommen -> über setOptions
        if (count($this->options) > 0) {
            $this->setOptions($this->options);
        }
        else {
            throw new Exception ('Bei Multi-Select-Elementen muss mindestens eine Option eingegeben werden');
        }
    }

    public function setOptions (array $options) {
        $this->storage->setOptionsForKey($this->getName().".options", $options);
    }

    public function getOptions () {
        return $this->storage->getOptionsForKey($this->getName().".options");
    }

     public function setSelected ($incomingArray) {
        //schreibt die angewählten Werte in Session
        $this->storage->setValueForKey($this->getName(), $incomingArray);
    }

    public function is_selected ($option) {
        //vergleicht ob $option in der Session (=ausgewählte Options) steht und gibt TRUE zurück, sonst FALSE
        if (in_array($option, $this->storage->getValueForKey($this->getName()))) {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }
}
?>
