<?php include('head.php');
include('homePc.php');
require_once("./class/Trajects.php");

?>


<div class="mainReservation">
<?php include('navbar.php');
$trajet = new Trajects($_SESSION['name_user']);
$idUser = $trajet->getID($_SESSION['name_user']);

$data = $trajet->getValidReservations($idUser['id_user']);


?>
    
    <h1>MES RÉSERVATIONS</h2>

    <?php
    
    if(count($data) > 0) {
        for ($i=0; $i < count($data); $i++) {
            $day = substr($data[$i]['jour_voyage'], 8);
            $monthNumber = substr($data[$i]['jour_voyage'], 5, 2);
            $month = $trajet->checkMonth($monthNumber);
            if($data[$i]['aller_retour'] == 'on') {
                $arrow = 'assets/img/go-return.svg';
            }
            elseif($data[$i]['aller_retour'] != 'on'){
                $arrow = 'assets/img/arrow-up.svg';
            }
        
            echo '
            <div class="infoTrajet mg-20 ">
                <div class="dateTrajet">
                    <h2 class="day">'.$day.'</h2>
                    <h2 class="arrivePlace">'.$month.'</h2>
                </div>
                <div class="placesTrajet">
                    <h2 class="departPlace">'.$data[$i]['depart'].'</h2>
                    <h2 class="arrivePlace">'.$data[$i]['destination'].'</h2>
                </div>
                <div class="go-return">
                    <img src="'.$arrow.'" alt="">
                </div>
            </div>';
        }
    }
    
    
    
    
    ?>

    <!-- <div class="infoTrajet mg-20">
        <div class="dateTrajet">
            <h2 class="day">05</h2>
            <h2 class="month">SEP</h2>
        </div>

        <div class="placesTrajet">
            <h2 class="departPlace">Dole</h2>
            <h2 class="arrivePlace">Lons le Saunier</h2>
        </div>

        <div class="go-return"><img src="assets/img/go-return.svg" alt=""></div>
    </div> -->

</div>




<script src="assets/js/user.js"></script>
<?php include('footer.php')?>