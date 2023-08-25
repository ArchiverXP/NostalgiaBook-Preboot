<?php
  define('host', 'localhost');
  define('username', "root");
  //define('DB_NAME', "squiddy");
  define('password', "Please Change Me"); //Remember to change on your instance!
  define('dbname', "nostbook");

  $link = mysqli_connect(host, username, password, dbname);
 
  // Check connection //this is from https://www.tutorialrepublic.com/php-tutorial/php-mysql-login-system.php
  if($link === false){
      die("ERROR: Could not connect. " . mysqli_connect_error());
  }  
?>