<?php

    $serveur = "localhost";
    $password ="";
    $database ="hms";
    $username="root";
    
    
    
    try {
    
        $con= new PDO("mysql:host=$serveur;dbname=$database", "$username", "$password");  

    
    
    } catch (Error $e) {
        echo "Failed to connect to Mysql". $e->getMessage(); 
    }
    

?>