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
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
    </body>
</html>
