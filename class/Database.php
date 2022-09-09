<?php
abstract class Database {

    public function connect() {
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=blablacampus;charset=utf8', 'root', '');
           return $bdd; 
         
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    }

}