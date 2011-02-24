<?php
    /**
     * Function loads classes automatically, when required
     */
    function __autoLoad ($classname){
        if (substr($classname, 0, 1) == '_') {
            $path = str_replace('_', '/', substr($classname, 1));
            $path .= "/".strrchr($classname, '_');
        }
        else {
            $path = str_replace('_', '/', $classname);
        }
        $path .= '.php';
        require_once $path;
    }

    try {
        //setzen der Datenquelle
        $post = new Forms_Controller_InputSourcePost();
        //erzeugen einer Factory-Instanz
        $formElement = Forms_Controller_ElementFactory::getInstance();
        //setzen der Datenquelle für das konkrete Objekt
        $formElement->setInputSource($post);
        //setzen eines Speicherortes für eigegebene Daten und Multi-Element-Optionen
        $formElement->setStorage(new Forms_Model_Session(), new Forms_Model_Definitions());
    }
    catch (Exception $e) {
        echo $e->getMessage();
    }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="styles.css">
        <title></title>
    </head>
    <body>
        <form method="post" action="?">
            <?php
                try {
                    //erzeugen von Formularelementen
                    echo $formElement->createElement("name", Forms_Controller_ElementFactory::TYPE_INPUT);
                    echo "<br />";
                    echo $formElement->createElement("kommentar", Forms_Controller_ElementFactory::TYPE_TEXTAREA);
                    echo "<br />";
                }
                catch (Exception $e) {
                    echo $e->getMessage();
                }
            ?>
            <input type="submit" value=" Absenden ">
        </form>
        <?php
            var_dump($_POST);
            var_dump($_SESSION);
        ?>
    </body>
</html>
