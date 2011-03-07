<?php
class Forms_Model_Definitions implements Forms_Interface_Model  {
    /* es gibt ein großes array in das alle Daten gespeichert werden
     * der key generiert sich dabei aus 'name.options' und der value aus dem eingegebenen options-array
     * außerdem gibt es noch weitere einträge, z. B. für default-werte von elementen, die unter 'name.default' gespeichert werden
     */

    protected $definitions = array();

    public function getValueForKey($key) {
        return $this->definitions[$key];
    }

    public function setValueForKey($key, $value) {
        $this->definitions[$key] = $value;
    }
}
?>
