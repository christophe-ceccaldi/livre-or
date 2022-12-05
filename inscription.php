<?php
// J'inclu la connexion à la BDD pour ne pas avoir à le faire sur toutes les pages. $conn est disponible // 

include('sqliconnect.php');

//requête pour tout sélectionner dans la DB// 
  $search = "SELECT * FROM utilisateurs";
  $query = $conn->query($search);
  $users = $query->fetch_all();
   //echo '<pre>';
    //var_dump($users);
    //echo '</pre>';

     
  //créer les conditions pour remplir les champs
    //appuyer sur le bouton envoyer//
    if (isset($_POST['submit'])){ 
    }
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
                //création variable

                $login = $_POST["login"];
                $password = $_POST["password"];
                $comfirm_password = $_POST["comfirm_password"];


                //puisques toute les conditions sont remplie alors insère les données dans la DB du nouvel utilisateur//
                $sql = "INSERT INTO `utilisateurs` (login, password) VALUES('$login', '$password')";


                if ($conn->query($sql) === TRUE) {
                    echo "les nouveaux enregistrements ajoutés avec succés";
                    header("Location: http://localhost/livre-or/connexion.php");
                    die();
                } else {
                    echo "Erreur: " . $sql . "
                " . $conn->error;
            
                }

            }
   
        $conn->close();
        
        
  
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
    
      
           
    