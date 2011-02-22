<?php
/* In dieser Klasse werden die Input-Source, der View und ggf. die Validierung für ein Text oder Input-Element erzeugt. Sprich: ein komplettes Formularelement
 * wird erzeugt. Dies geschieht mit Hilfe einer statischen Funktion, welche ein Objekt ihrer eigenen Klasse erzeugt. Auf dieses eine, gleichbleibende Objekt
 * kann dann immer wieder zugegriffen werden, ohne dass man jedes mal neue Instanzen mit 'new...' erzeugen muss. Dies spart Speicherplatz.
 */
class Forms_Controller_InputElementFactory {
    private static $instance;
    protected $inputSource, $storage;

    const TYPE_INPUT = 'input';
    const TYPE_TEXTAREA = 'textarea';
    const TYPE_EMAIL = 'email';
    const TYPE_PASSWORD = 'password';
    const TYPE_SELECT = 'select';
    const TYPE_RADIOBUTTON = 'radiobutton';
    const TYPE_CHECKBOX = 'checkbox';
    const TYPE_LABEL = 'label';

    private function  __construct() {}

    public static function getInstance () {
        /* Objekt bzw. Instanz wird nur neu erzeugt, wenn es leer ist. Auf diese Weise wird gewährleistet, dass erzeugte
         * Instanz immer gleich bleibt und nicht geändert/überschrieben werden kann
         */
        if (empty (self::$instance)) {
            self::$instance = new Forms_Controller_InputElementFactory();
        }
        return self::$instance;
    }

    public function setInputSource (Forms_Interface_Input $source) {
        $this->inputSource = $source;
    }

    public function setStorage (Forms_Interface_Model $storage) {
        $this->storage = $storage;
    }

    /**
     * Function creates a complete form element
     * @param string $name
     * @param string $type
     * @param array $options
     * @return Forms_Controller_TextElement
     */
    public function createElement ($name, $type, array $options=array()) {
        if (empty($this->inputSource)) {
            throw new Exception ('No input-source given');
        }

        $delegate = NULL;

        switch ($type) {
            case self::TYPE_EMAIL:
            case self::TYPE_INPUT:
                $element_view = new Forms_View_Input($name);
                break;
            case self::TYPE_TEXTAREA:
                $element_view = new Forms_View_TextArea($name);
                break;
            case self::TYPE_CHECKBOX:
                $element_view = new Forms_View_Multiple_Checkbox($name, $options);
                break;
            default:
                throw new Exception ('Unknown element-type');
        }
        
        //erzeugen eines neuen Formular-Elements unter Angabe des jeweiligen View-Elements und der Quelle (Post oder Get)
        $element = new Forms_Controller_TextElement($element_view);
        $element->setStorage($this->storage); //setzt Speicherort / -quelle
        $element->setInputSource($this->inputSource); //setzt Datenherkunftsort, z. B. Post-Werte
        $element->setDelegate($delegate); //setzen eines optionalen Delegate, z. B. Validator
        $element->initValueSource(); //initiert Quelle der gesetzten Werte eines Elements: entweder aus Post oder wenn das leer aus Session
        $element->addDesign("field-".$name);
        $element->addDesign("type-".$type);

        //Rückgabe des kreierten Elements
        return $element;
    }
}

?>
