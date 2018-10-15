<?php
session_start();
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '0796089346');
define('DB_DATABASE', 'db_camagru');
define("BASE_URL", "127.0.0.1/camagru/");

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
	$dbhost=DB_SERVER;
	$dbuser=DB_USERNAME;
	$dbpass=DB_PASSWORD;
	$dbname=DB_DATABASE;
	
	try {
		$dbConnection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass); 
		$dbConnection->exec("set names utf8");
		$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $dbConnection;
		}
		catch (PDOException $e) {
			echo 'Connection failed: ' . $e->getMessage();
		}
	}

function createTableDatabase() {
	$sql="CREATE TABLE Users (
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		firstname VARCHAR(30) NOT NULL,
		lastname VARCHAR(30) NOT NULL,
		email VARCHAR(50)";
	$conn->exec($sql);
	echo "Table created";
}

?>
