<?php

require_once 'config.php';

class Database{

	private static $connection;

	public static function getConnection(){
		if (!isset(self::$connection)){
			try{
				self::$connection = new PDO("mysql:host=" . db_host . ";dbname=" . db_name, db_user, db_password);
				self::$connection->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				self::$connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);				
			}catch (PDOException $e){
				echo $e->getMessage();
			}
			
		}
		return self::$connection;
	}
}