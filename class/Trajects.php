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
    public $baseurl;

    public function __construct($username) {
        $getId = $this->connect()->prepare("SELECT id_user FROM users WHERE username = :username");
        $getId->bindValue(':username', $username);
        $getId->execute();
        $id = $getId->fetch();
        $this->idUser = $id[0];
    }

    // FUNCTION DE REDIRECTION

    public function redirect($filename, $duree) {
        if (!headers_sent()) {
            header("Refresh: $duree;url=$this->baseurl/$filename");
        }
        else {
        echo '<script type="text/javascript">';
        echo 'window.location.href="'.$filename.'";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="'.$duree.';url='.$this->baseurl."/".$filename.'" />';
        echo '</noscript>';
        }

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
        $searchTraject = $this->connect()->prepare("SELECT users.username , users.bio , users.picture , depart , destination , jour_voyage , heure_depart , aller_retour , nb_voyageurs , etape_1 , etape_2 , etape_3 , trajets.id_user , id_trajet FROM `trajets` INNER JOIN users ON trajets.id_user = users.id_user WHERE `depart` = :depart AND `destination` = :destination AND `jour_voyage` = :jour_voyage AND `aller_retour` = :aller_retour OR `etape_1` = :depart AND `destination` = :destination AND `jour_voyage` = :jour_voyage AND `aller_retour` = :aller_retour OR `etape_2` = :depart AND `destination` = :destination AND `jour_voyage` = :jour_voyage AND `aller_retour` = :aller_retour OR `etape_3` = :depart AND `destination` = :destination AND `jour_voyage` = :jour_voyage AND `aller_retour` = :aller_retour ORDER BY `heure_depart` WHERE nb_voyageurs > '0';");
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

    public function checkMonthFull($month) {
        if($month == '01') {
            return 'janvier';
        } elseif($month == '02') {
            return 'février';
        }elseif($month == '03') {
            return 'mars';
        }elseif($month == '04') {
            return 'avril';
        }elseif($month == '05') {
            return 'mai';
        }elseif($month == '06') {
            return 'juin';
        }elseif($month == '07') {
            return 'juillet';
        }elseif($month == '08') {
            return 'août';
        }elseif($month == '09') {
            return 'septembre';
        }elseif($month == '10') {
            return 'octobre';
        }elseif($month == '11') {
            return 'novembre';
        }elseif($month == '12') {
            return 'décembre';
        }
    }

    public function addReservation($idUser, $idConducteur, $idTrajet) {
        $newReservation = $this->connect()->prepare("INSERT INTO reservation (`id_user` , `id_conducteur` , `id_trajet`) VALUES (:idUser , :idConducteur , :idTrajet)");
        $newReservation->bindValue(':idUser', $idUser);
        $newReservation->bindValue(':idConducteur', $idConducteur);
        $newReservation->bindValue(':idTrajet', $idTrajet);
        $newReservation->execute();
        $_SESSION['confirmMessage'] = 'Votre message a bien été envoyé !';
        $this->redirect("./blablacampus/confirmation.php", "0");

    }

    public function getReservations($idUser) {
        $reservationdata = $this->connect()->prepare("SELECT reservation.id_reservation, trajets.id_user, reservation.id_user, trajets.depart, trajets.destination, trajets.jour_voyage FROM `reservation` INNER JOIN trajets ON reservation.id_trajet = trajets.id_trajet WHERE trajets.id_user = :id_user;");
        $reservationdata->bindValue(':id_user', $idUser);
        $reservationdata->execute();
        $data = $reservationdata->fetchAll();
        return $data;
    }

    public function getDataValidation($idReservation) {
        $validationData = $this->connect()->prepare("SELECT users.username , users.picture , trajets.depart , trajets.destination , trajets.jour_voyage , id_reservation FROM (reservation INNER JOIN trajets ON trajets.id_trajet = reservation.id_trajet) INNER JOIN users ON users.id_user = reservation.id_user WHERE id_reservation = :idReservation ;");
        $validationData->bindValue(':idReservation', $idReservation);
        $validationData->execute();
        $data = $validationData->fetch();
        return $data;
    }

    public function confirmReservation($idReservation) {
        $confirm = $this->connect()->prepare("UPDATE reservation SET `accepted` = '1' WHERE id_reservation = :idReservation");
        $confirm->bindValue(':idReservation', $idReservation);
        $confirm->execute();
        $place = $this->connect()->prepare("SELECT reservation.id_trajet , trajets.nb_voyageurs FROM trajets INNER JOIN reservation ON reservation.id_trajet = trajets.id_trajet WHERE id_reservation = :idReservation");
        $place->bindValue(':idReservation', $idReservation);
        $place->execute();
        $places = $place->fetch();
        $idTrajet = $places['id_trajet'];
        $placeDispo = $places['nb_voyageurs'] - 1;
        $removePlace = $this->connect()->prepare("UPDATE trajets SET nb_voyageurs = :nbVoyageurs WHERE id_trajet = :idTrajet");
        $removePlace->bindValue(':idTrajet', $idTrajet);
        $removePlace->bindValue(':nbVoyageurs', $placeDispo);
        $removePlace->execute();
        $_SESSION['confirmMessage'] = 'Votre message a bien été envoyé !';
        $this->redirect("./blablacampus/confirmation.php", "0");
    }

    public function checkReservations($idTrajet, $idUser) {
        $check = $this->connect()->prepare("SELECT * FROM reservation WHERE id_trajet = :idTrajet AND id_user = :idUser");
        $check->bindValue(':idTrajet', $idTrajet);
        $check->bindValue(':idUser', $idUser);
        $check->execute();
        $exist = $check->fetch();
        return $exist;
    }

    public function getValidReservations($idUser) {
        $get = $this->connect()->prepare("SELECT trajets.id_trajet , trajets.jour_voyage , trajets.depart , trajets.destination , trajets.aller_retour FROM reservation INNER JOIN trajets ON reservation.id_trajet = trajets.id_trajet WHERE reservation.id_user = :idUser AND reservation.accepted = '1';
        ");
        $get->bindValue(':idUser',$idUser);
        $get->execute();
        $data = $get->fetchAll();
        return $data;
    }

    public function getValidations($idUser) {
        $reservationdata = $this->connect()->prepare("SELECT reservation.id_reservation, trajets.id_user, reservation.id_user, trajets.depart, trajets.destination, trajets.jour_voyage FROM `reservation` INNER JOIN trajets ON reservation.id_trajet = trajets.id_trajet WHERE reservation.id_user = :id_user AND accepted = '1';");
        $reservationdata->bindValue(':id_user', $idUser);
        $reservationdata->execute();
        $data = $reservationdata->fetchAll();
        return $data;
    }

    public function cancelTraject($idTrajet) {
        $place = $this->connect()->prepare("SELECT trajets.nb_voyageurs FROM trajets WHERE id_trajet = :idTrajet");
        $place->bindValue(':idTrajet', $idTrajet);
        $place->execute();
        $tempPlace = $place->fetch();
        $placeDispo = $tempPlace['nb_voyageurs'] + 1;
        $addPlace = $this->connect()->prepare("UPDATE trajets SET nb_voyageurs = :nbVoyageurs WHERE id_trajet = :idTrajet");
        $addPlace->bindValue(':idTrajet', $idTrajet);
        $addPlace->bindValue(':nbVoyageurs', $placeDispo);
        $addPlace->execute();
        $cancel = $this->connect()->prepare("DELETE FROM reservation WHERE id_trajet = :idTrajet");
        $cancel->bindValue(':idTrajet', $idTrajet);
        $cancel->execute();
        $this->redirect("./blablacampus/confirmation.php", "0");
    }
    



}





?>