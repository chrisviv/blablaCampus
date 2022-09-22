<?php
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
        $getId = $this->connect()->prepare("SELECT id_user FROM users WHERE username = :username");
        $getId->bindValue(':username', $username);
        $getId->execute();
        $id = $getId->fetch();
        $this->idUser = $id[0];
    }

// Ajout de trajet
    public function newTraject($depart, $destination, $jour_voyage, $heure_depart, $allerRetour, $nbPassagers, $step1, $step2, $step3) {
        $addTraject = $this->connect()->prepare("INSERT INTO trajets (`depart`, `destination`, `jour_voyage`, `heure_depart`, `heure_etape1`, `heure_etape2`, `heure_etape3`, `heure_destination`, `aller_retour`, `nb_voyageurs`, `etape_1`, `etape_2`, `etape_3`, `id_user`) VALUES (:depart, :destination, :jour_voyage, :heure_depart, :heure_etape1, :heure_etape2, :heure_etape3, :heure_destination, :aller_retour, :nb_voyageurs, :etape_1, :etape_2, :etape_3, :id_user)");
        $addTraject->bindValue(':depart', $depart);
        $addTraject->bindValue(':destination', $destination);
        $addTraject->bindValue(':jour_voyage', $jour_voyage);
        $addTraject->bindValue(':heure_depart', $heure_depart);
        $addTraject->bindValue(':heure_etape1', '');
        $addTraject->bindValue(':heure_etape2', '');
        $addTraject->bindValue(':heure_etape3', '');
        $addTraject->bindValue(':heure_destination', '');
        $addTraject->bindValue(':aller_retour', $allerRetour);
        $addTraject->bindValue(':nb_voyageurs', $nbPassagers);
        $addTraject->bindValue(':etape_1', $step1);
        $addTraject->bindValue(':etape_2', $step2);
        $addTraject->bindValue(':etape_3', $step3);
        $addTraject->bindValue(':id_user', $this->idUser);
        $addTraject->execute();
        $_SESSION['confirmMessage'] = 'Votre trajet a bien été créé !';
        header('Location: ./confirmation.php');
    }

// Modification de trajet   
    public function editTraject($id, $depart, $destination, $jour_voyage, $heure_depart, $allerRetour, $nbPassagers, $step1, $step2, $step3) {
        $editTraject = $this->connect()->prepare("UPDATE `trajets` SET `depart`= :depart ,`destination`= :destination ,`jour_voyage`= :jour_voyage ,`heure_depart`= :heure_depart , `heure_etape1` = :heure_etape1 , `heure_etape2` = :heure_etape2 ,  `heure_etape3` = :heure_etape3 ,`heure_destination` = :heure_destination ,`aller_retour`= :aller_retour,`nb_voyageurs`= :nb_voyageurs ,`etape_1`= :etape_1 ,`etape_2`= :etape_2 ,`etape_3`= :etape_3  WHERE `id_trajet` = :id_trajet");
        $editTraject->bindValue(':depart', $depart);
        $editTraject->bindValue(':destination', $destination);
        $editTraject->bindValue(':jour_voyage', $jour_voyage);
        $editTraject->bindValue(':heure_depart', $heure_depart);
        $editTraject->bindValue(':heure_etape1', '');
        $editTraject->bindValue(':heure_etape2', '');
        $editTraject->bindValue(':heure_etape3', '');
        $editTraject->bindValue(':heure_destination', '');
        $editTraject->bindValue(':aller_retour', $allerRetour);
        $editTraject->bindValue(':nb_voyageurs', $nbPassagers);
        $editTraject->bindValue(':etape_1', $step1);
        $editTraject->bindValue(':etape_2', $step2);
        $editTraject->bindValue(':etape_3', $step3);
        $editTraject->bindValue(':id_trajet', $id);
        $editTraject->execute();
        $_SESSION['confirmMessage'] = 'Votre trajet a bien été modifié !';
        header('Location: ./confirmation.php');
    }

// Filter de trajet
    public function searchTraject($depart, $destination, $jour_voyage, $aller_retour) {
        $searchTraject = $this->connect()->prepare("SELECT users.username , users.bio , users.picture , depart , destination , jour_voyage , heure_depart , aller_retour , nb_voyageurs , etape_1 , etape_2 , etape_3 , trajets.id_user , id_trajet FROM `trajets` INNER JOIN users ON trajets.id_user = users.id_user WHERE `depart` = :depart AND `destination` = :destination AND `jour_voyage` = :jour_voyage AND `aller_retour` = :aller_retour ORDER BY `heure_depart`;");
        $searchTraject->bindValue(':depart', $depart);
        $searchTraject->bindValue(':destination', $destination);
        $searchTraject->bindValue(':jour_voyage', $jour_voyage);
        $searchTraject->bindValue(':aller_retour', $aller_retour);
        $searchTraject->execute();
        $data = $searchTraject->fetchAll();
        return $data;
        
    }

    public function getTrajectData($idUser) {
        $getData = $this->connect()->prepare("SELECT * FROM trajets WHERE id_user = :id ORDER BY `jour_voyage`");
        $getData->bindValue(':id', $idUser);
        $getData->execute();
        $datas = $getData->fetchAll();
        return $datas;
    }

    public function getTrajectDataByID($id) {
        $getData = $this->connect()->prepare("SELECT * FROM trajets INNER JOIN users ON trajets.id_user = users.id_user WHERE id_trajet = :id ORDER BY `jour_voyage`");
        $getData->bindValue(':id', $id);
        $getData->execute();
        $datas = $getData->fetch();
        return $datas;
    }

    public function deleteTraject($idTraject) {
        $delete = $this->connect()->prepare("DELETE FROM trajets WHERE id_trajet = :id_trajet");
        $delete->bindValue(':id_trajet', $idTraject);
        $delete->execute();
        $_SESSION['confirmMessage'] = 'Votre trajet a bien été supprimé !';
        header('Location: ./confirmation.php');
    }

    public function checkMonth($month) {
        if($month == '01') {
            return 'JANV';
        } elseif($month == '02') {
            return 'FEVR';
        }elseif($month == '03') {
            return 'MARS';
        }elseif($month == '04') {
            return 'AVR';
        }elseif($month == '05') {
            return 'MAI';
        }elseif($month == '06') {
            return 'JUIN';
        }elseif($month == '07') {
            return 'JUIL';
        }elseif($month == '08') {
            return 'AOUT';
        }elseif($month == '09') {
            return 'SEPT';
        }elseif($month == '10') {
            return 'OCT';
        }elseif($month == '11') {
            return 'NOV';
        }elseif($month == '12') {
            return 'DEC';
        }
    }

}





?>