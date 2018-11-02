<?php

session_start();
include("config/config.php");

if (!isset($_SESSION['login']) || !isset($_POST['photo']) || $_POST['photo'] == '')
    exit ("Bad link. <meta http-equiv='refresh' content='0;url=index.php' />");
try {
    $conn = getDB();
    $sql = "INSERT INTO images (login, image, comments, likes) VALUES (?, ?, ?, ?)";
    $statement=$conn->prepare($sql);
    $statement->execute([$_SESSION['login'], $_POST['photo'], serialize([]), serialize([])]);
    }
catch (PDOexception $e) {
    echo $e->getMessage();
}
exit ("Photo taken. <meta http-equiv='refresh' content='1;url=upload.php' />");
