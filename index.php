<!DOCTYPE html>
<html lang="FR">
  <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="index.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">
    <title>header</title>
  </head>
  <body>
        <!--links to be redirected in my nav-->
        <header>
            <nav>
                <ul>
                    <li><a href="https://christophe-ceccaldi.students-laplateforme.io/livre-or/inscription.php">Inscriptions</a></li>
                    <li><a href="https://christophe-ceccaldi.students-laplateforme.io/livre-or/connexion.php">Connexion</a></li>
                    <li><a href="https://christophe-ceccaldi.students-laplateforme.io/livre-or/profil.php">Modifier profil</a></li>
                    <li><a href="https://christophe-ceccaldi.students-laplateforme.io/livre-or/commentaires.php">Commentaires</a></li>
                    <li><a href="https://christophe-ceccaldi.students-laplateforme.io/livre-or/livreor.php">Livre d'or</a></li>
                    <li><a href="https://christophe-ceccaldi.students-laplateforme.io/livre-or/deconnexion.php">Deconnexion</a></li>
                </ul >
                
            </nav>
        </header>
        <!--pour inclure le footer avec liens github-->
         <footer>
            <?php
            require "footer.php";
            ?>
         </footer>   
                
    </body>
</html>