<?php
// J'inclu la connexion à la BDD pour ne pas avoir à le faire sur toutes les pages. $conn est disponible // 

include "sqliconnect.php";

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
        <title>inscriptions</title>
  </head>
    <body class ="mama01">

        


        <h2>Commentaires</h2>
       <!--champs à remplir dans le formulaire pour commentaires user avec post pour récupérer les infos-->
        <form method="post">
            <!--use of label to display the values of keys input (field to fill)-->
            <label>
                <!--<span>Votre commentaire</span>--> 
                <!-- use of <textarea> pour champ de texte extensible à la zone de texte rempli-->            
                <textarea type="text" id="commentaires" name='commentaires'></textarea>
            </label>
                <input type="submit" id="button" name='submit'/>
            </form>
    </body>
</html>
    