<?php
class Database {
	public static $db;
	public static $con;
	function Database(){
		$this->user="creditosdb";$this->pass="creditosdb";$this->host="localhost";$this->ddbb="creditosdb";
	}

	function connect(){
		$con = new mysqli($this->host,$this->user,$this->pass,$this->ddbb);
		return $con;
	}

	public static function getCon(){
		if(self::$con==null && self::$db==null){
			self::$db = new Database();
			self::$con = self::$db->connect();
		}
		return self::$con;
	}
	
}
?>
