<?php
//ouverture de session//
session_start();
$login = $_SESSION['login'];
//pour les utilisateurs non connecté redirection vers la page connexion//
if (!isset($_SESSION['id'])) {
    header("Location: https://christophe-ceccaldi.students-laplateforme.io/livre-or/connexion.php");
}
// J'inclu la connexion à la DB pour ne pas avoir à le faire sur toutes les pages. $conn est disponible // 

require "sqliconnect.php";
//création des variables pour la page commentaires//
$usid = $_SESSION['id'];
//si tu pacours l'input comments et qu'il est vide c'est normal//
if (isset($_POST['comments'])){
    //création variable pour ma requête
    $ustext = htmlspecialchars($_POST['comments'], ENT_QUOTES);
    // allows to add special characters such as the apostrophe in the db
    $date = date('Y-m-d H:i:s');
    //requéte pour récupérer commentaire  user et date et les insérer dans le tableau commentaires de ma BD//
    $sql = "INSERT INTO `commentaires` (commentaire, id_utilisateur, date) VALUES ('$ustext', '$usid', '$date')";
    $sentcom = $conn->query($sql);
    //when comment is ok redirection on livre or page//
    header("Location: https://christophe-ceccaldi.students-laplateforme.io/livre-or/livreor.php");
}

    
?>


<!DOCTYPE html>
<html lang="FR">
  <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="commentaires.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">
        <title>commentaires</title>
  </head>
  <header>
            <nav>
                <!--links to be redirected in my nav-->
                <ul>
                    <li><a href="https://christophe-ceccaldi.students-laplateforme.io/livre-or/profil.php">Modifier profil</a></li>
                    <li><a href="https://christophe-ceccaldi.students-laplateforme.io/livre-or/commentaires.php">Commentaires</a></li>
                    <li><a href="https://christophe-ceccaldi.students-laplateforme.io/livre-or/livreor.php">Livre d'or</a></li>
                    <li><a href="https://christophe-ceccaldi.students-laplateforme.io/livre-or/deconnexion.php">Deconnexion</a></li>
                </ul >
                
            </nav>
        </header>
    <body class ="mama01">
    <!--php in html to display message with name of the user-->
    <?php echo "$login écrivez votre commentaire"?>
        <h2>Commentaires</h2>
       <!--champs à remplir dans le formulaire pour commentaires user avec post pour récupérer les infos-->
        <form method="post">
            <!--use of label to display the values of keys input (field to fill)-->
            <label>
                <!--<span>Votre commentaire</span>--> 
                <!-- use of <textarea> pour champ de texte extensible à la zone de texte rempli-->            
                <textarea type="text" id="comments" name='comments'value='comments'></textarea>
            </label>
                <input type="submit" id="button" name='submit'/>
            </form>
    </body>
</html>
