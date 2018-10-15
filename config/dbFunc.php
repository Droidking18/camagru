<?php
	define("DB_SERVER", "localhost");
	define("DB_USERNAME", "root");
	define("DB_PASSWORD", "0796089346");
	define("DB_DATABASE", "db_camagru");
	define("BASE_URL", "http://localhost:8080/Camagru/");

	function createInitialDatabase() {
		$dbhost = DB_SERVER;
		$dbname = DB_DATABASE;
	
		try {
			$conn = new PDO("mysql:host=$dbhost", DB_USERNAME, DB_PASSWORD);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "CREATE DATABASE $dbname";
			$conn->exec($sql);
			echo "Database created successfully<br/>";
		} catch (PDOException $e) {
			echo "Database creation failed: " . $e->getMessage() . "<br/>";
		}
	}

	function getDB() {
		$dbhost = DB_SERVER;
		$dbname = DB_DATABASE;
	
		try {
			$dbConnection = new PDO("mysql:host=$dbhost;dbname=$dbname;", DB_USERNAME, DB_PASSWORD);
			$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$dbConnection->exec("SET NAMES utf8");
			return $dbConnection;
		} catch (PDOException $e) {
			echo "Connection failed: " . $e->getMessage() . "<br/>";	
		}
	}
