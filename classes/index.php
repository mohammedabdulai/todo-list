<?php 
//turn on debugging messages
ini_set('display_errors', 'On');
error_reporting(E_ALL);

class Manage {
    static public  function autoload($class) 
    {
        //you can put any file name or directory here
        include './classes/'. $class . '.php';
    }
}
spl_autoload_register(array('Manage', 'autoload'));
//instantiate the program object
$obj = new main();
 ?>