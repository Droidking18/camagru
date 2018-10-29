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
                     $sql = "UPDATE users SET " . $_POST['type'] . "='" . $_POST['detail'] .  "' WHERE login = '" . $_SESSION['login'] . "';";
                    $conn->exec($sql);
                }
                catch (exception $e) {
                    echo $e->getMessage();
                }
             }
    }
    //}
    //catch (PDOException $e) {
    //    echo "Error" . $e->getMessage();
    //}
}
/*if (!$_GET['action'] && !$_POST['id'] && $_GET['id']) {
   9         $conn = getDB();
  10         $sql = "SELECT * FROM Users";
  11         foreach ($conn->query($sql) as $user) {
  12             if ($user['id'] == $_GET['id']) {
  13                 $sql = "UPDATE Users SET emailverify = 'Y' WHERE id = '" . $_GET['id'] ."';";
  14                 $conn->exec($sql);
  15                 echo "<meta http-equiv='refresh' content='0;url=login.php' />";
  16             }
  17         }
  18     }*/
