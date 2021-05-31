<?php

session_start();
header('Content-Type: text/html; charset=utf-8');
$mysqli = mysqli_connect("localhost", "a0528179_sdo_0407", "YsovoTez", "a0528179_sdo_0407");



if ($mysqli == false){
    print("error");
}
else {
//    print("Соединение установлено успешно<br><hr>");

$email = trim(mb_strtolower($_POST['email']));
$pass = trim($_POST['pass']);

    $result = $mysqli->query("SELECT * FROM `users` WHERE `email`='$email'");
    $result = $result->fetch_assoc();

    if(password_verify($pass, $result['pass'])) {
        echo "ok";
        $_SESSION['name'] = $result['name'];
        $_SESSION['lastname'] = $result['lastname'];
        $_SESSION['email'] = $result['email'];
        $_SESSION['id'] = $result['id'];
    }  else {
        echo "User_not_found";
    }
}
