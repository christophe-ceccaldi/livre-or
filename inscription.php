<?php
// J'inclu la connexion à la BDD pour ne pas avoir à le faire sur toutes les pages. $conn est disponible // 

include('sqliconnect.php');
$login = $_POST['login'];
//requête pour tout sélectionner dans la DB// 
 
 // $users = $query->fetch_all();
   //echo '<pre>';
    //var_dump($users);
    //echo '</pre>';

     
  //créer les conditions pour remplir les champs
    //appuyer sur le bouton envoyer//
   if (isset($_POST['submit'])){ 
                //création variable

                $login = $_POST['login'];
                $password = $_POST['password'];
                $comfirm_password = $_POST["comfirm_password"];

        if (isset($login) && isset($password) && isset($comfirm_password)){
            if ($password == $comfirm_password){
            $search = "SELECT * FROM `utilisateurs` WHERE login='$login'";
            $query = $conn->query($search);
            $verif = mysqli_num_rows($query);
            if ($verif === 0){

                $sql = $conn->query("INSERT INTO `utilisateurs` (login, password) VALUES('$login', '$password')");


                echo 'vous etes bien enregistré';
                } else echo 'ce login n\'est disponible';
            
                //echo 'coucou';

            } else echo "motd de passe différent";
        } //else echo 'echec';  




   }       /*   
            //création variale pour même utilisateur et pour utilisateur valide//
            $mmuser = false;
            $validuser = false;
            // vérifier pour chaque utilisateurs ajouter que le login et le mot de passe n'existe pas//
            foreach ($users as $user){
                $dbLogin = $user[1];
                $dbpassword = $user[2];
                if (isset($_POST['login']) && ($dbLogin == $_POST['login'])){
                    $mmuser = true; 
                }
            }
            //Vérifie si tout les champs sont remplie alors c'est un utilisateur valide// 
            if (isset($_POST["login"]) && isset($_POST["password"]) && isset($_POST["comfirm_password"])) {
                $validuser = true;
            }


        
            
            //si l'utilisateur est différent d'un utilisateur déja existant//
            if($validuser && !$mmuser){
               

                //puisques toute les conditions sont remplie alors insère les données dans la DB du nouvel utilisateur//
                $sql = "INSERT INTO `utilisateurs` (login, password) VALUES('$login', '$password')";


                if ($conn->query($sql) === TRUE) {
                    echo "les nouveaux enregistrements ajoutés avec succés";
                    //header("Location: connexion.php");
                    die();
                } else {
                    echo "Erreur: " . $sql . "
                " . $conn->error;
            
                }

        
    }
        $conn->close();
 */       

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
        <title>inscriptions</title>
    </head>
    <header>
        <nav>
            <ul>
                <li><a href="http://localhost/livre-or/inscription.php">Inscriptions</a></li>
                <li><a href="http://localhost/livre-or//connexion.php">Connexion</a></li>
                <li><a href="http://localhost/livre-or//profil.php">Modifier profil</a></li>
                <li><a href="http://localhost/livre-or//commentaires.php">Commentaires</a></li>
                <li><a href="http://localhost/livre-or//livre-or.php">Livre d'or</a></li>
                <li><a href="http://localhost/livre-or//deconnexion.php">Deconnexion</a></li>
            </ul >
            
        </nav>
    </header>
    <body class ="mama01">

        


        <h2>inscriptions</h2>
       <!--champs à remplir dans le formulaire pour inscription user avec post pour récupérer les infos-->
        <form method="post">
            <!--use of label to display the values of keys input (field to fill)-->
            <label>
                <span>Login</span>
                <input type="text" id="login" name='login'/>
            </label>
            
            <label>
                <span>Password</span>
                <input type="password" id="password" name='password' minlength="3" required/>
            </label>

            <label>
                <span>Comfirmpassword</span>
                <input type="password" id="comfirm_password" name='comfirm_password' minlength="3" required/>
            </label>
                <input type="submit" id="button" name='submit'/>
            </form>
    </body>
</html>
    
      
           
    