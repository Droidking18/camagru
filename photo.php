<?php

session_start();
include("config/config.php");

if (!isset($_SESSION['login']) || !isset($_POST['photo']) || $_POST['photo'] == '')
    exit ("Bad link. <meta http-equiv='refresh' content='0;url=index.php' />");
exit ($_POST['photo']);
try {
    $conn = getDB();
    $sql = "INSERT INTO images (login, image) VALUES (?, ?)";
    $statement=$conn->prepare($sql);
    $statement->execute([$_SESSION['login'], $_POST['photo']]);
    }
catch (PDOexception $e) {
    echo $e->getMessage();
}





/*
 * try {
  10         if ($_POST['notify'] == "on")
  11             $notify = "Y";
  12         else
  13             $notify = "N";
  14         $conn = getDB();
  15         $hash = password_hash($_POST['password'], PASSWORD_BCRYPT);
  16         $id = uniqid('', TRUE) . uniqid('', TRUE);
  17         $login = htmlspecialchars($_POST["login"]);
  18         $email = htmlspecialchars($_POST["email"]);
  19         $sql = "INSERT INTO users (id, login, password, email, notify) VALUES ('". htmlspecialchars($id) ."', '" . htmlspecialchars($login) . "', '" . htmlspecialchars($hash) . "', '". htmlspecialchars($email) ."', '" . $notify . "');";
  20         $conn->exec($sql);
  21         }
