<?php
header('Content-Type: text/html; charset=utf-8');
$mysqli = mysqli_connect("localhost", "a0528179_sdo_0407", "YsovoTez", "a0528179_sdo_0407");


if ($mysqli == false){
      print("error");
  }
  else {
  //    print("Соединение установлено успешно<br><hr>");

      $name = $_POST['name'];
      $lastname = $_POST['lastname'];
      $email = trim(mb_strtolower($_POST['email'])); // trim(mb_strtolower) - пробел и нижний регистр 
      $pass = trim($_POST['pass']); // trim - только удалили пробел
      $pass = password_hash("$pass", PASSWORD_DEFAULT);

      $result = $mysqli->query("SELECT * FROM `users` WHERE `email`='$email'");
      if($result->num_rows!=0) {
            print("exist");
      } else { $mysqli->query("INSERT INTO `users`(`name`, `lastname`, `email`, `pass`) 
      VALUES ('$name', '$lastname', '$email', '$pass')");
            // добавляем значение в таблицу базы данных (в таблице нажали SQL, Insert, вставили сюда,id удалили)
            print("ok");
      };
  }
