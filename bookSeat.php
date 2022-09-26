<?php include('head.php');
include('navbar.php');
require_once("./class/Trajects.php");

$trajet = new Trajects($_SESSION['name_user']);
$dataTrajet = $trajet->getTrajectDataByID($_GET['reserv']);
$day = substr($dataTrajet['jour_voyage'], 8);
$monthNumber = substr($dataTrajet['jour_voyage'], 5, 2);
$month = $trajet->checkMonth($monthNumber);
if($dataTrajet['username'] == $_SESSION['name_user']) {
    header('Location: ./search.php');
}
if($_SESSION['search'][3] == 'on') {
    $arrow = 'assets/img/go-return.svg';
}
elseif($_SESSION['search'][3] != 'on'){
    $arrow = 'assets/img/arrow-up.svg';
}


?>

<div class="bookSeatMain">
    
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

    <div class="bookSeatBtn" id="bookSeatBtn">
        <a href="list.php">
            <button>ENVOYER MA DEMANDE</button>
        </a>
    </div>



    
    
</div>

<script src="assets/js/user.js"></script>
<?php include('footer.php') ?>