<?php
//page pour deconnexion session//

session_start();
session_destroy();
header("Location: https://christophe-ceccaldi.students-laplateforme.io/livre-or/connexion.php");

?>