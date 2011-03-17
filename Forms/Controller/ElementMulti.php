<?php
class Forms_Controller_ElementMulti extends Forms_Controller_Element {
    protected $options;

    public function  __construct($name, array $options, array $default) {
        $this->setName($name);
        $this->options = $options;
        $this->default = $default;
    }

    public function  init() {
        //falls default-Wert(e) gesetzt, werden sie in Definitions-Storage geschrieben
        if (count($this->default) > 0) {
            $this->setDefault($this->default);
        }

        //muss Werte setzen aus Post -> über setSelected
        $incomingValues = $this->inputSource->getValueForKey($this->getName());
        if (is_array($incomingValues)) {
            $this->setSelected($incomingValues);
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
        //TODO: verallgemeinern, so dass auch andere storage controller abgefragt werden können
        $stored_options = $this->storage->getValueForKey($this->getName());
        if ($stored_options[$option] == 'on') {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }
}
?>
