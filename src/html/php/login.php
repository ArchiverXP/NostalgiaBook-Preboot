<?php 


session_start();

require "php/config.php";
//require "php/check.php";


$username = mysqli_real_escape_string($link, $_POST['name']);
$password = mysqli_real_escape_string($link, $_POST['password']);

$passErr = "";
$nameErr = "";





if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST['name'] OR empty($_POST['password']))) {
    mysqli_next_result($link);
    $nameErr = "Name or Password required!";
    } else if (!empty($_POST['name'] AND !empty($_POST['password']))){
        $sql = "SELECT id FROM toons WHERE username = '$username'";
        //$stmt = $link->prepare($sql);
        $result = mysqli_query($link,$sql);

        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        mysqli_store_result($link);
        $count = mysqli_num_rows($result);
        //$stmt->execute();
        $mario = $_SESSION["username"] = $username;
        if (!isset($mario)){
          echo "CURRENTLY: LOGGED OUT";
        }
        else {
          header("location: landing/landing.html");
          echo("ECHO");
          die();
        }

        if($count = 1){
          $_SESSION["username"] = $username;
          $the = "SELECT password FROM toons WHERE username = '$username';";
          $result = mysqli_query($link,$the);
          $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
          $getPasswordHas = $row['password'];
          //$count = mysqli_num_rows($result);


          if(password_verify($password, $getPasswordHas)){
            header("location: landing/landing.html");
            die();
          }          
          else {
            echo("Sorry kid, but that's wrong!");
          }



        } else if($count = 0){
          header("location: error/scary.html");
        }          
    }  
  }
?>