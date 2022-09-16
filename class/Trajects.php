<?php
session_start();
require_once("./class/Database.php");
require_once("./class/User.php");
class Trajects extends User {

    public $idTraject;
    public $depart;
    public $destination;
    public $dateDepart;
    public $dateStep1;
    public $dateStep2;
    public $dateStep3;
    public $dateDestination;
    public $allerRetour = false;
    public $nbPassagers = 1;
    public $step1;    
    public $step2;    
    public $step3;
    public $idUser;

    public function __construct($username) {
        $getId = $this->connect()->prepare("SELECT id FROM users WHERE username = :username");
        $getId->bindValue(':username', $username);
        $getId->execute();
        $id = $getId->fetch();
        $this->id = $id;
    }

    public function newTraject($depart, $destination, $dateDepart, $allerRetour, $nbPassagers, $step1, $step2, $step3) {
        $addTraject = $this->connect()->prepare("INSERT INTO trajets (depart, destination, date_depart, aller_retour, nb_voyageurs, etape_1, etape_2, etape_3, id_user) VALUES (:depart, :destination, :date_depart, :aller_retour, :nb_voyageurs, :etape_1, :etape_2, :etape_3, :id_user)");
        $addTraject->bindValue(':depart', $depart);
        $addTraject->bindValue(':destination', $destination);
        $addTraject->bindValue(':date_depart', $dateDepart);
        $addTraject->bindValue(':aller_retour', $allerRetour);
        $addTraject->bindValue(':nb_voyageurs', $nbPassagers);
        $addTraject->bindValue(':etape_1', $step1);
        $addTraject->bindValue(':etape_2', $step2);
        $addTraject->bindValue(':etape_3', $step3);
        $addTraject->bindValue(':id_user', $_SESSION['name_user']);
        $addTraject->execute();
        $_SESSION['confirmMessage'] = 'Votre trajet a bien été créé !';
        header('Location: ./confirmation.php');
    }

    public function editTraject() {

    }

}





?>