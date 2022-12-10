<?php

 //connexionn DB on plesk
try{
    $conn = new mysqli("localhost", "christophe", "goldeneyes/13", "christophe-ceccaldi_livreor");
 
}
catch(Exception $e) {
    echo $e->getMessage();
}

 
?>