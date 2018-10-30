<?php

session_start();
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
                 } catch (exception $e) {
                    echo $e->getMessage();
                 }
             }
    }
}
