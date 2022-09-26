<?php include('head.php'); 
require_once("./class/Trajects.php");
include('homePc.php');
$user = new User();
$trajet = new Trajects($_SESSION['name_user']);
$user->getData($_SESSION['name_user']);
$dataReservation = $trajet->getReservations($user->id);

?>


<div class="bookVadilateMain">
<?php include('navbar.php') ?>
    <h1>MESSAGERIE</h1>

    <?php
    if(count($dataReservation) > 0) {
        for ($i=0; $i < count($dataReservation); $i++) {
            $day = substr($dataReservation[$i]['jour_voyage'], 8);
            $monthNumber = substr($dataReservation[$i]['jour_voyage'], 5, 2);
            $month = $trajet->checkMonthFull($monthNumber);
            $year = substr($dataReservation[$i]['jour_voyage'], 0, 4);
            $dataPassager = $user->getDataByID($dataReservation[$i]['id_user']);
            echo '
            <div class="messagerieMain">
                <img class="redCircul" src="data:image;base64,'.$dataPassager['picture'].'" alt="">
                <div class="messagerieCircul">
    
                    <p><span>'.$dataPassager["username"].'</span></p>
                    <p><span> Demande </span>de réservation pour le trajet</p>
                    <p>'.$dataReservation[$i]["depart"].' - '.$dataReservation[$i]["destination"].' du '.$day.' '.$month.' '.$year.'</p>
                </div>
            </div>
    
            <div class="ligne"></div>
            <div class="circul"></div>';
    
        }
    }
    else {
        echo "<h2> Tu n'as message.</h2>";
    }
    
    ?>

    <!-- <div class="messagerieMain">
        <img class='redCircul' src="https://picsum.photos/200" alt="">
        <div class="messagerieCircul">

            <p><span>Alain</span></p>
            <p><span> Demande </span>de réservation pour le trajet</p>
            <p>Dole Lons le Saunier du 5 Semptembre 2022</p>
        </div>
    </div>

    <div class="ligne"></div>
    <div class="circul"></div>

    <div class="messagerieMain">
        <img class='redCirculChat' src="https://picsum.photos/200" alt="">
        <div class="messagerieCircul">

            <p><span>Chris</span></p>
            <p><span> Demande </span>de réservation pour le trajet</p>
            <p>Dole Lons le Saunier du 5 Semptembre 2022</p>
        </div>
    </div>


    <div class="ligne"></div>
    <div class="circul"></div>

    <div class="messagerieMain">
        <img class='redCirculChat' src="https://picsum.photos/200" alt="">
        <div class="messagerieCircul">

            <p><span>Chris</span></p>
            <p><span> Demande </span>de réservation pour le trajet</p>
            <p>Dole Lons le Saunier du 5 Semptembre 2022</p>
        </div>
    </div> -->
</div>


<script src="assets/js/user.js"></script>
<?php include('footer.php'); ?>