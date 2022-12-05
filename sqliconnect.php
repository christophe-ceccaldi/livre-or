<?php
//connexion en local host//
try{
    $conn = mysqli_connect("localhost", "root", "", "livreor");
}
catch(Exception $e) {
    echo $e->getMessage();
}

 
?>