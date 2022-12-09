<?php

//ouverture de session//
/*session_start();
if (isset($_SESSION['login'])){

$login = $_SESSION['login'];
echo "$login lisez le livre d'or ou cliquez sur commentaires pour laisser un autre commentaire";
}*/
// J'inclu la connexion à la DB pour ne pas avoir à le faire sur toutes les pages $conn est disponible // 

include "sqliconnect.php";
//requête pour le tableau commentaires//
//$search = "SELECT * FROM commentaires ORDER BY `date` ASC";
//$query = $conn->query($search);
//$comments = $query->fetch_all(MYSQLI_ASSOC);
//Var_dump($comments);

//requête pour que la colonne login du tableau utilisateur soit associer à id_utilisateur du tableau commentaires//

$indentify = "SELECT commentaire, login, date FROM `commentaires` INNER JOIN `utilisateurs` ON commentaires.id_utilisateur = utilisateurs.id ORDER BY date DESC";
$query = $conn->query($indentify);
//var_dump($query);
$idenuser = $query->fetch_all();
//var_dump($idenuser);

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
  <header>
            <nav>
                <ul>
                    <li><a href="http://localhost/livre-or//commentaires.php">Commentaires</a></li>
                    <li><a href="http://localhost/livre-or//livre-or.php">Livre d'or</a></li>
                    <li><a href="http://localhost/livre-or//deconnexion.php">Deconnexion</a></li>
                </ul >
                
            </nav>
        </header>

    <body class ="mama01">

        


        <h2>Livre d'or</h2>
        <?php echo "lisez le livre d'or, si vous déjà êtes connecté cliquez sur commentaires pour laisser un autre commentaire";?>
       
       <!--champs à remplir dans le formulaire livre d'or date user  commentaire avec post pour récupérer les infos-->
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
                   
                    
                    // création de la variable pour récupérer la query des 2 tableaux//
                    //$filter = array_column($idenuser, 'login', 'id_utilisateur');
                    // Variable pour utiliser le login et l'afficher//
                    //$login = $filter[$id_user];

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
