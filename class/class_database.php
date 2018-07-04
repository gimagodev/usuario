<?php

// http://www.codeofaninja.com/2015/12/angularjs-crud-example-php.html

class Database {
	
	
	// specify your own database credentials
	private $host = "localhost";
	private $db_name = "usuario"; 
	private $username = "root"; 
	private $password = "";  
	public $conn;
	

	/*
	// specify your own database credentials
	private $host = "localhost:8889";   
	private $db_name = "biblia"; 
	private $username = "root";
	private $password = "root";
	public $conn;
	*/

	// get the database connection
	public function getConnection() {
		$this->conn = null;

		try {
			$this->conn = new PDO("mysql:host=" .$this->host. "; dbname=" .$this->db_name, $this->username, $this->password);
		} catch(PDOExecption $exception) {
			echo "Connection error: ".$exception->getMessage();
		}

		return $this->conn;

	}
}
?>
