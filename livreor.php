<?php

// J'inclu la connexion à la DB pour ne pas avoir à le faire sur toutes les pages $conn est disponible // 

require "sqliconnect.php";

//requête pour que la colonne login du tableau utilisateur soit associer à id_utilisateur du tableau commentaires//

$indentify = "SELECT commentaire, login, date FROM `commentaires` INNER JOIN `utilisateurs` ON commentaires.id_utilisateur = utilisateurs.id ORDER BY date DESC";
$query = $conn->query($indentify);
$idenuser = $query->fetch_all();


?>


<!--HTML part-->
<!DOCTYPE html>
<html lang="FR">
  <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="livreor.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">
        <title>commentaires</title>
  </head>
  <header>
            <!--links to be redirected in my nav-->
            <nav>
                <ul>
                    <li><a href="https://christophe-ceccaldi.students-laplateforme.io/livre-or/commentaires.php">Commentaires</a></li>
                    <li><a href="https://christophe-ceccaldi.students-laplateforme.io/livre-or/livreor.php">Livre d'or</a></li>
                    <li><a href="https://christophe-ceccaldi.students-laplateforme.io/livre-or/deconnexion.php">Deconnexion</a></li>
                </ul >
                
            </nav>
        </header>

    <body class ="mama01">

        


        <h2>Livre d'or</h2>
        <?php echo "lisez le livre d'or, si vous  êtes déjà connecté cliquez sur commentaires pour laisser un autre commentaire";?>
       
       <!--champs à remplir dans le formulaire livre d'or date user commentaire avec post pour récupérer les infos-->
        <form method="post">
            <table>
    
            <caption>Vos commentaires dans le livre d'or</caption>

                <tr> <th>Commentaires</th> <th>Utilisateurs</th> <th>Posté le</th> </tr>
            <!--php dans le html-->
            <?php 
                //pour chaque élément du tableau commentaires puis création des variables//
                foreach ($idenuser as $comment) {
                    $commentaire = $comment[0];
                    $id_user = $comment[1];
                    $date = $comment[2];

                    //affichage de mes variables dans mon tableaux du livre d'or//

                    echo "
                    
                        <tr>
                            <td>$comment[0]</td>
                            <td>$comment[1]</td> 
                            <td>$comment[2]</td> 
                            
                             
                        </tr>
                
                    ";
                }
            
            ?>

            </table>
        </form>
          
    </body>
</html>
