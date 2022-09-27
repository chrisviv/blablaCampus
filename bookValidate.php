<?php include('head.php');
include('navbar.php');
require_once("./class/Trajects.php");

$trajet = new Trajects($_SESSION['name_user']);

if(isset($_GET['reserv']) && $_GET['reserv'] != "NULL") {
    $idReservation = $_GET['reserv'];
}elseif(isset($_GET['id_reservation'])) {
    $idReservation = $_GET['id_reservation'];
}

$data = $trajet->getDataValidation($idReservation);

$day = substr($data['jour_voyage'], 8);
$monthNumber = substr($data['jour_voyage'], 5, 2);
$month = $trajet->checkMonthFull($monthNumber);
$year = substr($data['jour_voyage'], 0, 4);

if(isset($_GET['validate'])){
    $trajet->confirmReservation($idReservation);
}


?>

<div class="bookVadilateMain">
   
    <h1>VALIDATION DE LE RÉSERVATION</h1>

    <div class="bookValidate">
    <img class='redCircul'src="data:image;base64,<?php echo $data['picture'] ?>" alt="Photo de profil">
    <div class="bookVadilateCircul">
        
        <p><span><?php echo $data['username'] ?></span></p>
        <p>Demande de réservation pour le trajet</p>
        <p><?php echo $data['depart']." - ".$data['destination'] ?> du <?php echo $day." ".$month." ".$year ?></p>
    </div>
</div>

<div class="boxBookValidate">
    <p> Bonjour <span><?php echo $data['username'] ?></span></p>
    <p>Je t’informe qu’une place t’attend dans ma voiture <br> pour le trajet <span> <?php echo $data['depart']." - ". $data['destination'] ?>.</span></p>
    <p>A bientot.</p>
</div>
</div>
    <form action='' method='get'>
        <input type='hidden' name='id_reservation' value='<?php echo $idReservation?>'>
        <input class='bookSeatBtn' type='submit' name='validate' value='VALIDER LA RÉSERVATION'>
    </form>
</div>



<?php include('footer.php')?>
   