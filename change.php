<?php

session_start();
include ("config/config.php");


if (isset($_SESSION['login'])) {
     $conn = getDB();
     $sql = "SELECT * FROM Users WHERE login='" . $_SESSION['login'] . "'";
     foreach ($conn->query($sql) as $user){
         if (password_verify($_POST['password'], $user['password'])) {
                 echo $_POST['type'];
             }
     }
}
     //exit();
