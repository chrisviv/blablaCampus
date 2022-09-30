<?php include('head.php');
<<<<<<< HEAD
include('homepc.php');
require_once("./class/trajects.php");
=======
include('./homepc.php');
require_once("./class/Trajects.php");
>>>>>>> 5871de78af5df6328b1a1fc458927f81061b8ec7

$trajet = new Trajects($_SESSION['name_user']);
$depart = $_SESSION['search'][0];
$destination = $_SESSION['search'][1];
$jour_voyage = $_SESSION['search'][2];
$aller_retour = $_SESSION['search'][3];
$data = $trajet->searchTraject($depart, $destination, $jour_voyage, $aller_retour);
// Conversion format date
$day = substr($_SESSION['search'][2], 8);
$monthNumber = substr($_SESSION['search'][2], 5, 2);
$month = $trajet->checkMonth($monthNumber);
// Modification flèches aller_retour
if($_SESSION['search'][3] == 'on') {
    $arrow = 'assets/img/go-return.svg';
}
elseif($_SESSION['search'][3] != 'on'){
    $arrow = 'assets/img/arrow-up.svg';
}






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
        
        // Generation des trajets
        for ($i=0; $i < count($data); $i++) {
            // Generation des étapes
            if($data[$i]['etape_1'] != ''){
                $etape1 = "<div class='travel-half'><h3 class='hour half-hour'></h3><img src='assets/img/circle-line.svg'alt='cercle avec ligne'><h3 class='place half-place'>".$data[$i]['etape_1']."</h3></div>";
            }else{
                $etape1 ="";
            }
            if($data[$i]['etape_2'] != ''){
                $etape2 = "<div class='travel-half'><h3 class='hour half-hour2'></h3><img src='assets/img/circle-line.svg'alt='cercle avec ligne'><h3 class='place half-place2'>".$data[$i]['etape_2']."</h3></div>";
            }else{
                $etape2 ="";
            }
            if($data[$i]['etape_3'] != ''){
                $etape3 = "<div class='travel-half'><h3 class='hour half-hour3'></h3><img src='assets/img/circle-line.svg'alt='cercle avec ligne'><h3 class='place half-place3'>".$data[$i]['etape_3']."</h3></div>";
            }else{
                $etape3 ="";
            }
    // Affichage des etapes
            echo "
    <a href='bookSeat.php?reserv=".$data[$i]['id_trajet']."'>
        <div class='card-trajet'>
            <h2>PLACES DISPONIBLES
                <span class='phpNumber'>".$data[$i]['nb_voyageurs']."</span>
            </h2>

            <div class='card-body'>
                <div class='travel-start'>
                    <h3 class='hour hour-start'>".substr($data[$i]['heure_depart'], 0, 5)."</h3>
                    <img src='assets/img/circle-line.svg' alt='Cercle avec ligne'>
                    <h3 class='place place-start'>".$data[$i]['depart']."</h3>
                </div>
                    ".$etape1."
                    ".$etape2."
                    ".$etape3."
                <div class='travel-end'>
                    <h3 class='hour hour-end'></h3>
                    <img src='assets/img/circle.svg' alt='cercle avec ligne'>
                    <h3 class='place place-end' >".$data[$i]['destination']."</h3>
                </div>
            </div>

            <div class='profile-travel'>
                <img src='data:image;base64," . $data[$i]['picture'] . "' alt='Image dune personne'/>

                <div class='user-travel'>
                    <h2>".$data[$i]['username']."</h2>
                    <h3>".$data[$i]['bio']."</h3>
                </div>
            </div>


        </div>
    </a>";
        }
        
        
        ?>
        <!-- <div class="card-trajet">
            <h2>PLACES DISPONIBLES
                <span class="phpNumber">2</span>
            </h2>

            <div class='card-body'>
                <div class='travel-start'>
                    <h3 class='hour'>06H30</h3>
                    <img src='assets/img/circle-line.svg' alt='Cercle avec ligne'>
                    <h3 class='place'>Dole</h3>
                </div>

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


        </div> -->
</div>
<script src="assets/js/hourtracker.js"></script>
<script src="assets/js/user.js"></script>
<?php include('footer.php') ?>