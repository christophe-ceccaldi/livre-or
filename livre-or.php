<?php

//ouvertur de session//
session_start();

// J'inclu la connexion à la DB pour ne pas avoir à le faire sur toutes les pages $conn est disponible // 

include "sqliconnect.php";
//requête pour le tableau commentaires//
$search = "SELECT * FROM commentaires ORDER BY `date` ASC";
$query = $conn->query($search);
$comments = $query->fetch_all(MYSQLI_ASSOC);
Var_dump($comments);
//requête id pour le tableau utilisateurs//
//"SELECT id, login FROM `utilisateurs`";
//$query = $conn->query($indentify);
//$idenuser = $query->fetch_all();
//Var_dump($idenuser);
//requête pour que la colonne login du tableau utilisateur soit associer à id_utilisateur du tableau commentaires//
// $indentify = "SELECT utilisateurs.login, commentaires.id_utilisateur FROM `utilisateurs` INNER JOIN `commentaires` ON utilisateurs.id = commentaires.id_utilisateur";
$indentify = "SELECT commentaires.id_utilisateur, utilisateurs.login FROM `commentaires` INNER JOIN `utilisateurs` ON commentaires.id_utilisateur = utilisateurs.id";
$query = $conn->query($indentify);
$idenuser = $query->fetch_all(MYSQLI_ASSOC);
Var_dump($idenuser);


// $val = array_search('')

/*foreach($comments as $comment){
    // $date = $valuetab[3];
    // $user = $valuetab[2];
    // $comment = $valuetab[1];
}*/
?>


<!--HTML part-->
<!DOCTYPE html>
<html lang="FR">
  <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="livre-or.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">
        <title>commentaires</title>
  </head>
    <body class ="mama01">

        


        <h2>Livre d'or</h2>
       <!--champs à remplir dans le formulaire livre d'or date user  commentaire avec post pour récupérer les infos-->
        <form method="post">
            <table>
    
                <caption> Vos commentaires dans le livre d'or</caption>

                <tr> <th>Posté le</th> <th>Utilisateurs</th> <th>Commentaires</th> </tr>
            <!--php dans le html-->
            <?php 
                //pour chaque élément du tableau commentaires puis création des variables//
                foreach ($comments as $comment) {
                    $date = $comment['date'];
                    $id_user = $comment['id_utilisateur'];
                    $comment = $comment['commentaire'];
                    // création de la variable pour récupérer la query des 2 tableaux//
                    $filter = array_column($idenuser, 'login', 'id_utilisateur');
                    // Variable pour utiliser le login et l'afficher//
                    $login = $filter[$id_user];

                    //affichage de mes variables dans mon tableaux du livre d'or//

                    echo "
                    
                        <tr>
                            <td>$date</td> 
                            <td>$login</td> 
                            <td>$comment</td> 
                        </tr>
                
                    ";
                }
            
            ?>

            </table>
        </form>
          
    </body>
</html>
