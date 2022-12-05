<?php
session_start();
//$_SESSION['admin'] = false;
//$_SESSION['loggedIn'] = false;

$validuser = false;
if (isset($_GET["login"]) && isset($_GET["password"])) {
  $validuser = true;
}

//var_dump($_GET);

if ($validuser) {
  $login = $_GET["login"];
  $password = $_GET["password"];

// J'inclu la connexion à la BDD pour ne pas avoir à le faire sur toutes les pages. $conn est disponible // 

include "sqliconnect.php";

  //connexionn DB on plesk
  //$conn = new mysqli("localhost", "chris", "Nowayback13", "christophe-ceccaldi_moduleconnexion");

  $sql = "SELECT `login`, `password` FROM utilisateurs WHERE `login` = '$login' AND `password` = '$password'";
  $result = $conn->query($sql);
//var_dump($result);


  if  ($result->num_rows > 0){

  $_SESSION['login'] = $login;
  //echo $result[0];

    if ($login === 'admin') {
      //$_SESSION['admin'] = true;
      header("Location: http:/localhost/livre-or/admin.php");

    }
    else {
      header("Location: http://localhost/livre-or/index.php");
    }

  }
}
/*else {
  echo "user is not valid";
}*/
?>


<!DOCTYPE html>
<html lang="FR">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="connexion.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">
    <title>connexion</title>
  </head>
  <body>
    <!--title of my form-->
    <h2>connexion</h2>
       <!--use of  label and span in the form of connexion page-->
      <form>
        <label>
          <span>Login</span>             
          <input type="text" id="login" name='login'/>
        </label>

        <label>
          <span>Password</span>             
          <input type="password" id="password" name='password' minlength="3" required/>
        </label>
          
          <input type="submit" id="button" name='button'/>
      </form>
          
  </body>
</html>