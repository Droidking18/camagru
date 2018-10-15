<?php
session_start();
?>
	<form action="validator.php" method="POST">
  Login:<br>
  <input style="width: 300px;" type="text" name="login" placeholder="Enter login" required><br>
  Password:<br>
  <input style="width: 300px;" type="password" name="password" placeholder="Enter password. pls no bruteforce." required><br><br>
  <input type="submit" value="Submit">
</form>


