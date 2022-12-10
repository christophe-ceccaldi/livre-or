<?php
//open the session//
session_start();
$login = $_SESSION['login'];
//if is not a valid seesion go to connection page//
if (!isset($_SESSION['id'])) {
    header("Location: https://christophe-ceccaldi.students-laplateforme.io/livre-or/connexion.php");
}
// J'inclu la connexion à la BDD pour ne pas avoir à le faire sur toutes les pages. $conn est disponible // 

require "sqliconnect.php";


//création of variable about the session
$id = $_SESSION['id'];

//if submit button is use//
if (isset($_POST['submit'])){
    //creation variable //
    $login = $_POST['login'];
    $password = $_POST['password'];
    //request to update new changes abour profile//
    $sql = "UPDATE `utilisateurs` SET login = '$login', password = '$password' WHERE id = '$id'";
    $updated = $conn->query($sql);
    //if changes are done are ok message ok// 
    if ($updated) {
        echo "user info has been updated";
      //else message wrong//  
    } else {
        echo "user info could not be updated";
    }
    
}
    else
    {
         //vérifier que l'utilisateur possède un login ds la DB pour savoir si user enregistrer(query pour fetch_array DB)//
        //récupérer tout dans la DB//
            $search = "SELECT * FROM utilisateurs WHERE id = '$id'";
            $query = $conn->query($search);
            $user = $query->fetch_array();
            //création variable//
            $login = $user['login'];
            $password = $user['password'];
             

    }

?>

<!DOCTYPE html>
<html lang="FR">
  <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="profil.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">
        <title>Modifier son profil</title>
  </head>
  <header>
        <!--links to be redirected in my nav-->
            <nav>
                <ul>
                    <li><a href="https://christophe-ceccaldi.students-laplateforme.io/livre-or/profil.php">Modifier profil</a></li>
                    <li><a href="https://christophe-ceccaldi.students-laplateforme.io/livre-or/commentaires.php">Commentaires</a></li>
                    <li><a href="https://christophe-ceccaldi.students-laplateforme.io/livre-or/livreor.php">Livre d'or</a></li>
                    <li><a href="https://christophe-ceccaldi.students-laplateforme.io/livre-or/deconnexion.php">Deconnexion</a></li>
                </ul >
                
            </nav>
  </header>
    <body class ="mama01">

       

    <!--title uper of my form to midified user-->
    <h2>Modifier son profil</h2>
    <?php echo "$login vous pouvez modifier votre profil"?>
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
                <!--<span>Deconnexion</span>
                <a href= "deconnexion.php">deconnexion</a>
                </label>-->
                <label>
                <span>Connexion</span><br>
                <input type="submit" id="button" name='submit'/>
                </label>
        </form>
        <!--include footer in my page-->
        <footer>
            <?php
            require "footer.php";
            ?>
         </footer>   
    </body>
</html>