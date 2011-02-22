<?php
class Forms_Controller_Storage {
    protected $model_data, $model_definitions, $observers = array();

    public function  __construct(Forms_Interface_Model $model_data, Forms_Interface_Model $model_definitions) {
        $this->model_data = $model_data;
        $this->model_definitions = $model_definitions;
    }

    public function getValueForKey ($key) {
        return $this->model_data->getValueForKey($key);
    }

    public function setValueForKey ($key,$value) {
        $this->model_data->setValueForKey($key,$value);

        if (array_key_exists($key, $this->observers)) {
            foreach ($this->observers as $observer) {
                $observer->valueForKeyChanged($this,$key);
            }
        }
    }

    public function getOptionsForKey ($key) {
        return $this->model_definitions->getValueForKey($key);
    }

    public function setOptionsForKey ($key, $value) {
        $this->model_definitions->setValueForKey($key, $value);
    }

    public function addObserverForKey (Forms_Interface_KeyObserver $observer, $key) {

    }

    public function removeObserverForKey (Forms_Interface_KeyObserver $observer,$key) {
        
    }
}
?>
