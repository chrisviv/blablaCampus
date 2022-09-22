<?php include('head.php');
include('homePc.php');
require_once("./class/Trajects.php");

$trajet = new Trajects($_SESSION['name_user']);
$depart = $_SESSION['search'][0];
$destination = $_SESSION['search'][1];
$jour_voyage = $_SESSION['search'][2];
$aller_retour = $_SESSION['search'][3];
$data = $trajet->searchTraject($depart, $destination, $jour_voyage, $aller_retour);
$day = substr($_SESSION['search'][2], 8);
$month = substr($_SESSION['search'][2], 5, 2);
if($month == '01') {
    $month = 'JANV';
} elseif($month == '02') {
    $month = 'FEVR';
}elseif($month == '03') {
    $month = 'MARS';
}elseif($month == '04') {
    $month = 'AVR';
}elseif($month == '05') {
    $month = 'MAI';
}elseif($month == '06') {
    $month = 'JUIN';
}elseif($month == '07') {
    $month = 'JUIL';
}elseif($month == '08') {
    $month = 'AOUT';
}elseif($month == '09') {
    $month = 'SEPT';
}elseif($month == '10') {
    $month = 'OCT';
}elseif($month == '11') {
    $month = 'NOV';
}elseif($month == '12') {
    $month = 'DEC';
}
if($_SESSION['search'][3] == 'on') {
    $arrow = 'assets/img/go-return.svg';
}
elseif($_SESSION['search'][3] != 'on'){
    $arrow = 'assets/img/arrow-up.svg';
}
var_dump($data);






?>
<div class="listMain">
    <?php include('navbar.php');?>
    <h1>
        <?php 
        if(count($data) < 1) {
            echo 'AUCUN TRAJET DISPONIBLE';
        }
        elseif(count($data) == 1) {
            echo 'TRAJET DISPONIBLE';
        }else {
            echo 'TRAJETS DISPONIBLES';
        }
        ?>
        </h2>

        <div class="infoTrajet">
            <div class="dateTrajet">
                <h2 class="day"><?php echo $day ?></h2>
                <h2 class="month"><?php echo $month ?></h2>
            </div>

            <div class="placesTrajet">
                <h2 class="departPlace"><?php echo $_SESSION['search'][0]?></h2>
                <h2 class="arrivePlace"><?php echo $_SESSION['search'][1] ?></h2>
            </div>

            <div class="go-return"><img src="<?php echo $arrow ?>" alt=""></div>
        </div>

        <div class="trajetCount">
            <h2>
                <?php
                if(count($data) < 1) {
                    $dispo = 'trajet disponible..';
                }
                elseif(count($data) == 1) {
                    $dispo = 'trajet disponible';
                }else {
                    $dispo = 'trajets disponibles';
                }
                echo "<span class='phpNumber'>".count($data)."</span> $dispo";
            ?>
            </h2>

            <div class="clockInfo">
                <img src="assets/img/clock.svg" alt="">
                <h2>Les trajets sont triés chronologiquement par heure de départ.</h2>
            </div>
        </div>

        <?php
        
        
        for ($i=0; $i < count($data); $i++) {
            $none = "";
            if($data[$i]['etape1'] != ''){
                $etape1 = "<div class='travel-half'><h3 class='hour'>JS</h3><img src='assets/img/circle-line.svg'alt='cercle avec ligne'><h3 class='place'>".$data[$i]['etape1']."</h3></div>";
            }
            var_dump($etape1);
            echo "
        <div class='card-trajet'>
            <h2>PLACES DISPONIBLES
                <span class='phpNumber'>".$data[$i]['nb_voyageurs']."</span>
            </h2>

            <div class='card-body'>
                <div class='travel-start'>
                    <h3 class='hour'>".substr($data[$i]['heure_depart'], 0, 5)."</h3>
                    <img src='assets/img/circle-line.svg' alt='Cercle avec ligne'>
                    <h3 class='place'>".$data[$i]['depart']."</h3>
                </div>
                    ".$etape1."
                <div class='travel-end'>
                    <h3 class='hour'>JS</h3>
                    <img src='assets/img/circle.svg' alt='cercle avec ligne'>
                    <h3 class='place'>".$data[$i]['destination']."</h3>
                </div>
            </div>

            <div class='profile-travel'>
                <img src='https://picsum.photos/200/300' alt='Photo de profil'>

                <div class='user-travel'>
                    <h2>".$data[$i]['username']."</h2>
                    <h3>".$data[$i]['bio']."</h3>
                </div>
            </div>


        </div>";
        }
        
        
        ?>
        <div class="card-trajet">
            <h2>PLACES DISPONIBLES
                <span class="phpNumber">2</span><!-- php -->
            </h2>

            <div class='card-body'>
                <div class='travel-start'>
                    <h3 class='hour'>06H30</h3><!-- php -->
                    <img src='assets/img/circle-line.svg' alt='Cercle avec ligne'>
                    <h3 class='place'>Dole</h3><!-- php -->
                </div>

                <!-- <div class='travel-half'>
                <h3 class='hour'>06H30</h3>
                <img src='assets/img/circle-line.svg' alt='cercle avec ligne'>
                <h3 class='place'>Dole</h3>
            </div> -->



                <div class='travel-end'>
                    <h3 class='hour'>07H30</h3>
                    <img src='assets/img/circle.svg' alt='cercle avec ligne'>
                    <h3 class='place'>Lons-le-Saunier</h3>
                </div>
            </div>

            <div class="profile-travel">
                <img src="https://picsum.photos/200/300" alt="Photo de profil">

                <div class="user-travel">
                    <h2>PHP USERNAME</h2>
                    <h3>PHP BIO </h3>
                </div>
            </div>


        </div>

        <div class="card-trajet">
            <h2>PLACES DISPONIBLES
                <span class="phpNumber">2</span>
            </h2>

            <div class="card-body">
                <div class="travel-start">
                    <h3 class="hour">06H30</h3>
                    <img src="assets/img/circle-line.svg" alt="">
                    <h3 class="place">Dole</h3>
                </div>

                <div class="travel-half">
                    <h3 class="hour">06H30</h3>
                    <img src="assets/img/circle-line.svg" alt="">
                    <h3 class="place">Dole</h3>
                </div>

                <div class="travel-end">
                    <h3 class="hour">07H30</h3>
                    <img src="assets/img/circle.svg" alt="">
                    <h3 class="place">Lons-le-Saunier</h3>
                </div>
            </div>

            <div class="profile-travel">
                <img src="https://picsum.photos/200/300" alt="Photo de profil">

                <div class="user-travel">
                    <h2>PHP USERNAME</h2>
                    <h3>PHP BIO </h3>
                </div>
            </div>


        </div>
</div>

<script src="assets/js/user.js"></script>
<?php include('footer.php') ?>