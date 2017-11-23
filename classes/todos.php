<?php
/**
* 
*/
class todos extends page
{
	protected static $usr;
	public function __construct()
	{
		if ($_SESSION['login']==true){
			self::$usr = $_SESSION['usr'];
			$db = dbConn::getConnection();
		}
		else{
			header('Location: index.php?page=login');
		}
	}
	public static function getTodos(){

	}
}

?>