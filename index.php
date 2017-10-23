<?php 
//turn on debugging messages
ini_set('display_errors', 'On');
error_reporting(E_ALL);
//loads required classes; it finds and includes PHP file to prevent progam fail for calling a missing class
class Manage {
    static public  function autoload($class) 
    {
        include './classes/'. $class . '.php';
    }
}
spl_autoload_register(array('Manage', 'autoload'));
//instantiates the program object
$obj = new main();
 ?>