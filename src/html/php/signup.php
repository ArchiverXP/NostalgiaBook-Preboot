<?php
require "config.php";
session_start();
$username = mysqli_real_escape_string($link, $_POST['name']);
$password = password_hash(mysqli_real_escape_string($link, $_POST['password']),PASSWORD_DEFAULT);
$passErr = "";
$nameErr = "";

error_reporting(-1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST['name'] OR empty($_POST['password']))) {
    $nameErr = "Name or Password required!";
    } else if (!empty($_POST['name'] AND !empty($_POST['password']))){
        $sql = "INSERT INTO toons (username, password) VALUES(?,?);";
        $stmt = $link->prepare($sql);
        //$toon = $link->prepare($duplicatefind);
        $stmt->bind_param('ss', $username, $password);
        //$toon->bind_param("s", $username);
        if (mysqli_num_rows(mysqli_query($link, "SELECT username FROM toons WHERE username = '$username'")));{
            echo ("This username has already been taken, please select a new one.");
        }
        
        $stmt->execute();
        //$toon->execute();

        

    }

    
  }

?>