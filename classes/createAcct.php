<?php
/**
* 
*/
class createAcct extends page
{
	
	function __construct(argument)
	{
	  	$usr = $_POST['email'];
	    $pwd = $_POST['pwd'];
	    $usr == $username && $psw == $password session_start(); 
	    if ($_SESSION['login']==true || ($usr=="admin" && $pwd=="password")) {  
	    	$_SESSION['login']=true;
	    	$_SESSION['usr']=$usr;
	    	$db = $dbConn:getConnection();
	    	header('location: index.php?page=todos');
	    }
	    else { 
	    	header('location: index.php?page=login');
	    }
	}
}
?>