<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if (session_status() == 1) {
    session_start();
}
include ("config/config.php");


if (isset($_SESSION['login'])) {
    $conn = getDB();
    if ($_POST['type'] == "password")
        $_POST['detail'] = password_hash($_POST['detail'], PASSWORD_BCRYPT);
    if (password_verify($_POST['password'], $_SESSION['passhash'])) {
             if ($_POST['type'] == "notify" && $_POST['detail'] != "Y" || $_POST['type'] == "notify" && $_POST['detail'] != "N" || $_POST['type'] != "notify") {
                 try {
                     $sql = "UPDATE users SET " . $_POST['type'] . "= ?  WHERE login = ?";
                     $statement= $conn->prepare($sql);
                     $statement->execute([$_POST['detail'], $_SESSION['login']]);
                     if ($_POST['type'] == "login")
                         $_SESSION['login'] = $_POST['detail'];
                     if ($_POST['type'] == "email")
                         $_SESSION['email'] = $_POST['detail'];
                     if ($_POST['type'] == "password")
                         $_SESSION['passhash'] = $_POST['detail'];
                 } catch (exception $e) {
                     echo $e->getMessage() . "\n";
                     exit ("Something went wrong, try again <meta http-equiv='refresh' content='3;url=account.php' />");
                 }
             }
    }
    else
        exit ("Password entered was incorrect. <meta http-equiv='refresh' content='3;url=account.php' />");
    echo "<meta http-equiv='refresh' content='0;url=index.php' />";
}
