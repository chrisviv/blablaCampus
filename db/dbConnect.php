<?php

class dbConnect {
    function __construct() {
        require_once('config.php');
        try {
            $conn = new PDO('mysql:host=localhost;dbname=blablacampus',DB_USER, DB_PASSWORD);
            return $conn;
            }
        catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}

?>