<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: http://localhost/livre-or/connexion.php");
}
// J'inclu la connexion à la BDD pour ne pas avoir à le faire sur toutes les pages. $conn est disponible // 

include "sqliconnect.php";

//connexionn DB on plesk
//$conn = new mysqli("localhost", "chris", "Nowayback13", "christophe-ceccaldi_moduleconnexion");

$exlogin = $_SESSION['login'];

//var_dump($_POST);

if (isset($_POST['submit'])){
    $id = $user[0];
    $login = $_POST['login'];
    $password = $_POST['password'];

    $sql = "UPDATE `utilisateurs` SET login = '$login', password = '$password' WHERE login = '$exlogin'";
    $updated = $conn->query($sql);
    if ($updated) {
        echo "user info has been updated";
    } else {
        echo "user info could not be updated";
    }
    //var_dump($result);
}
    else
    {
    

        //vérifier que l'utilisateur possède un login ds la DB pour savoir si user enregistrer(query pour fetch_all DB)//
        //récupérer tout dans la DB
            $search = "SELECT * FROM utilisateurs WHERE login = '$exlogin'";
            $query = $conn->query($search);
            $user = $query->fetch_array();
        //echo '<pre>';
        //var_dump($user);
            $id = $user[0];
            $login = $user['login'];
            $password = $user['password'];
        //$comfirm_password = $user['comfirm_password'];
        //echo '</pre>';
        //création variable validusser//
        //$dblogin = $users[0];
        
        
        //pour chaque utilisateurs qui possède un login autorisent les a modifier leurs profils//
        

    }

?>

<!DOCTYPE html>
<html lang="FR">
  <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="inscription.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">
        <title>Modifier son profil</title>
  </head>
    <body class ="mama01">

       

       <!--title uper of my form to midified user-->
        <h2>Modifier son profil</h2>
        <!--champs à remplir dans le formulaire pour modofoer son profil user avec post pour récupérer les infos-->
        <form method="post">
            <!--used of php in my input to field data of users who wa register in the DB yet-->     
            <label>
                <span>Login</span>
                <input type="text" id="login" name='login' value="<?php echo $login?>"/>
            </label>
            <!--used of php in my input to field data of users who wa register in the DB yet-->
            <label>
                <span>Password</span>
                <input type="password" id="password" name='password' minlength="3" required value ="<?php echo $password ?>"/>
            </label>
                <!--input of the submit and reset button-->
                <label>
                    <span>Deconnexion</span>
                 <!--<input type="reset" id="button" name='reset'/>-->
                 <a href= "deconnexion.php">deconnexion</a>
                 </label>
                 <label>
                    <span>Connexion</span><br>
                 <input type="submit" id="button" name='submit'/>
                 </label>
            </form>
    </body>
</html>