<?php include('head.php');

require_once("./class/Trajects.php");

$trajet = new Trajects($_SESSION['name_user']);
$user = new User();

if(isset($_GET['reserv'])) {
    $dataTrajet = $trajet->getTrajectDataByID($_GET['reserv']);
}elseif(isset($_GET['id_trajet'])) {
    $dataTrajet = $trajet->getTrajectDataByID($_GET['id_trajet']);
}

if(!isset($dataTrajet)) {
    header('Location: ./search.php');
}
$day = substr($dataTrajet['jour_voyage'], 8);
$monthNumber = substr($dataTrajet['jour_voyage'], 5, 2);
$month = $trajet->checkMonth($monthNumber);


if($_SESSION['search'][3] == 'on') {
    $arrow = 'assets/img/go-return.svg';
}
elseif($_SESSION['search'][3] != 'on'){
    $arrow = 'assets/img/arrow-up.svg';
}
$user->getData($_SESSION['name_user']);
$idUser = $user->id;

$idConducteur = $user->getID($dataTrajet['username']);

$msg = 'ENVOYER MA DEMANDE';

if(isset($_GET['reservation'])){
    $idTrajet = $_GET['id_trajet'];
    $existReserv = $trajet->checkReservations($idTrajet, $idUser);
    
    if($existReserv != true){
        $trajet->addReservation($idUser, $idConducteur['id_user'],$idTrajet);
    }
    else {
        $msg = 'Tu as déjà réservé ce trajet';
    }
}

include('./homepc.php');
?>

<div class="bookSeatMain">
    <?php include('navbar.php'); ?>
    <h1>RÉSERVER UNE PLACE</h1>

    <div class="infoBookSeat">
        <div class="dateBookSeat">
            <h2 class="day"><?= $day ?></h2>
            <h2 class="month"><?= $month ?></h2>
        </div>

        <div class="placesBookSeat">
            <h2 class="departPlaceBookSeat"><?= $dataTrajet['depart'] ?></h2>
            <h2 class="arrivePlaceBookSeat"><?= $dataTrajet['destination'] ?></h2>
        </div>

        <div class="go-return"><img src="<?= $arrow ?>" alt=""></div>
    </div>
 
    

   <div class="boxBookSeat">
        <p> Bonjour <span> <?= $dataTrajet['username'] ?> </span></p>
        <p>Je souhaiterai réserver une place dans ta voiture <br> pour le trajet <span><?= $_SESSION['search'][0]." - ".$_SESSION['search'][1]  ?></span></p>
        <p>En te remerciant.</p>
    </div>

        <?php
        if($dataTrajet != "NULL") {
            $trajectID = $dataTrajet["id_trajet"];
        }
        
        if($dataTrajet['username'] != $_SESSION['name_user']) {
            echo "
            <form action='' method='get'>
                <input type='hidden' name='id_trajet' value='$trajectID'>
                <input style='letter-spacing: 3px;' class='bookSeatBtn' type='submit' name='reservation' value='$msg'>
            </form>
            ";
        }else {
            echo "
            <form action=''>
                
                <div class='bookSeatBtn' id='bookSeatBtn'>
                <a href='edit_trajet.php?edit=".$trajectID."'>
                    EDITER MON TRAJET
                </a>
                </div>
                </a>
                </form>
                ";
            }
            
            ?>
    
</div>

<script src="assets/js/user.js"></script>
<?php include('footer.php') ?>