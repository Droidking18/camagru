<?php

include ("config.php");
  echo"lol";	
try {
createInitialDatabase();
createUsersTable($conn);
$conn = getDB();
}
catch (PDOException $e) {
	echo 'Connection failed: ' . $e->getMessage();
}
