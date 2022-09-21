<?php
session_start();
require_once("./class/Database.php");
require_once("./class/User.php");
class Trajects extends User {

    public $idTraject;
    public $depart;
    public $destination;
    public $jourVoyage;
    public $heureDepart;
    public $heureStep1;
    public $heureStep2;
    public $heureStep3;
    public $heureDestination;
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

// Ajout de trajet A TESTER !
    public function newTraject($depart, $destination, $jour_voyage, $heure_depart, $allerRetour, $nbPassagers, $step1, $step2, $step3) {
        $addTraject = $this->connect()->prepare("INSERT INTO trajets (depart, destination, jour_voyage, heure_depart, aller_retour, nb_voyageurs, etape_1, etape_2, etape_3, id_user) VALUES (:depart, :destination, :jour_voyage, :heure_depart: :aller_retour, :nb_voyageurs, :etape_1, :etape_2, :etape_3, :id_user)");
        $addTraject->bindValue(':depart', $depart);
        $addTraject->bindValue(':destination', $destination);
        $addTraject->bindValue(':jour_voyage', $jour_voyage);
        $addTraject->bindValue(':heure_depart', $heure_depart);
        $addTraject->bindValue(':aller_retour', $allerRetour);
        $addTraject->bindValue(':nb_voyageurs', $nbPassagers);
        $addTraject->bindValue(':etape_1', $step1);
        $addTraject->bindValue(':etape_2', $step2);
        $addTraject->bindValue(':etape_3', $step3);
        $addTraject->bindValue(':id_user', $_SESSION['name_user']);
        $addTraject->execute();
        $_SESSION['confirmMessage'] = 'Votre trajet a bien été créé !';
        $getTrajectID = $this->connect()->prepare("SELECT id_trajet FROM trajets WHERE depart = :depart AND destination = :destination AND jour_voyage = :jour_voyage AND heure_depart = :heure_depart AND id_user = :id_user");
        $getTrajectID->bindValue(':depart', $depart);
        $getTrajectID->bindValue(':destination', $destination);
        $getTrajectID->bindValue(':jour_voyage', $jour_voyage);
        $getTrajectID->bindValue(':heure_depart', $heure_depart);
        $getTrajectID->bindValue(':id_user', $_SESSION['name_user']);
        $getTrajectID->execute();
        $trajectID = $getTrajectID->fetch();
        getTrajectData($trajectID);
        header('Location: ./confirmation.php');
    }

// Modification de trajet A TESTER !    
    public function editTraject($id, $depart, $destination, $jour_voyage, $heure_depart, $allerRetour, $nbPassagers, $step1, $step2, $step3) {
        $editTraject = $this->connect()->prepare("");
    }

// Filter de trajet A TESTER !
    public function searchTraject() {
        
    }

    public function getTrajectsData($id) {
        $getData = $this->connect()->prepare("SELECT * FROM trajets WHERE id = :id");
        $getData->bindValue(':id', $id);
        $getData->execute();
        $datas = $getData->fetch();
        $this->idTraject = $datas['id_trajet'];
        $this->depart = $datas['depart'];
        $this->destination = $datas['destination'];
        $this->JourVoyage = $datas['jour_voyage'];
        $this->heureDepart = $datas['heure_depart'];
        $this->heureStep1 = $datas['heure_etape1'];
        $this->heureStep2 = $datas['heure_etape2'];
        $this->heureStep3 = $datas['heure_etape3'];
        $this->heureDestination = $datas['heure_destination'];
        $this->allerRetour = $datas['aller_retour'];
        $this->nbPassagers = $datas['nb_passagers'];
        $this->step1 = $datas['etape_1'];
        $this->step2 = $datas['etape_2'];
        $this->step3 = $datas['etape_3'];
    }

    public function getUserId($username) {
        $getData = $this->connect()->prepare("SELECT id_user FROM users WHERE username = :username");
        $getData->bindValue(':username', $_SESSION['username']);
        $getData->execute();
        $userID = $getData->fetch();
        return $userID;
    }

}





?>