<?php


include ("config/config.php");

    if (!$_GET['id'])
        exit("Bad link.");
    $conn = getDB();
    $sql = "SELECT * FROM Users";
    foreach ($conn->query($sql) as $user) {
        if ($user['id'] == $_GET['id']) {
            $sql = "UPDATE Users SET emailverify = 'Y' WHERE id = '" . $_GET['id'] ."';";
            $conn->exec($sql);
            echo "<meta http-equiv='refresh' content='0;url=login.php' />";
        }
    }
    echo "<meta http-equiv='refresh' content='0;url=login.php' />";
