<?php


function mail_ver($id, $email) {
$msg = "Hi, please click this link to activate your account: 127.0.0.1:8080/camagru/mailver.php?=id" . $id;
mail($email,"Instaspam verification",$msg);
}
?>
