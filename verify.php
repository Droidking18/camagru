<?php
session_start();

include ("config/config.php");
include ("header.php");

if (isset($_POST['login']) && isset($_POST['password']) && isset($_POST['email'])) {
	try {
		$conn = getDB();
		echo "......".$_POST['password']."........";
	$hash = password_hash($_POST['password'], PASSWORD_BCRYPT);
	$sql = "INSERT INTO users (login, password, email) VALUES ('".$_POST["login"]."', '".$hash."', '".$_POST["email"]."');";
	$conn->exec($sql);
	exit("<meta http-equiv='refresh' content='4;url=login.php' />");}
	catch (PDOexception $e) { 
		if (preg_match ("/Duplicate/", $e->getMessage()))
			if (preg_match ("/login/", $e->getMessage())){
				echo "Username \"" . $_POST['login'] . "\" has been taken. Try a different one. Redirecting..";
				echo "<meta http-equiv='refresh' content='0;url=login.php' />";
			}
			elseif (preg_match ("/email/", $e->getMessage())){
				echo "Email \"" . $_POST['email'] . "\" is associated to an account. Try logging in. Redirecting..";
				echo "<meta http-equiv='refresh' content='4;url=login.php' />";
			}
	}
}
?>

