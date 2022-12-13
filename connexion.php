<?php
//ouverture de session//
session_start();

//if conditions are ok so it's valid user//
$validuser = false;
if (isset($_GET["login"]) && isset($_GET["password"])) {
  $validuser = true;
}


//if he's valid creation of variable for retrive info from input//
if ($validuser) {
  $login = $_GET["login"];
  $password = $_GET["password"];

// J'inclu la connexion à la BD pour ne pas avoir à le faire sur toutes les pages $conn est disponible // 

require "sqliconnect.php";

  //connexionn DB on plesk
  //$conn = new mysqli("localhost", "chris", "Nowayback13", "christophe-ceccaldi_moduleconnexion");

  //request for to back information in my BD//
  $sql = "SELECT `id`, `login`, `password` FROM utilisateurs WHERE `login` = '$login' AND `password` = '$password'";
  $result = $conn->query($sql);
  $user = $result->fetch_assoc();
 

  if  ($result->num_rows > 0){
  $_SESSION ['login'] = $login;
  $_SESSION['id'] = $user['id'];
  //echo $result[0];

  header("Location: https://christophe-ceccaldi.students-laplateforme.io/livre-or/commentaires.php");


  }
}

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
  <header>
    <nav>
      <ul>
        <li><a href="https://christophe-ceccaldi.students-laplateforme.io/livre-or/inscription.php">Inscriptions</a></li>
        <li><a href="https://christophe-ceccaldi.students-laplateforme.io/livre-or/commentaires.php">Commentaires</a></li>
        <li><a href="https://christophe-ceccaldi.students-laplateforme.io/livre-or/livreor.php">Livre d'or</a></li>
      </ul >
        
    </nav>
  </header>
  
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
    <footer>
      <!--include footer in my page-->
      <?php
      require "footer.php";
      ?>
    </footer>         
  </body>
</html>