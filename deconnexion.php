<?php
//page pour deconnexion session//

session_start();
session_destroy();
header("Location:connexion.php");

?>