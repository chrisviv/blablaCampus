<?php include('head.php')?>
<?php 
<<<<<<< HEAD
require_once("./class/trajects.php");
include('homepc.php');
=======
require_once("./class/Trajects.php");
include('./homepc.php');
>>>>>>> 5871de78af5df6328b1a1fc458927f81061b8ec7

$trajet = new Trajects($_SESSION['name_user']);
$trajects = $trajet->getTrajectData($trajet->idUser);
?>
<div class="mainReservation">
    <?php include('navbar.php');?>
    <h1>MES TRAJETS</h2>

<?php
if(count($trajects) > 0) {
    for ($i=0; $i < count($trajects); $i++) {
        $day = substr($trajects[$i]['jour_voyage'], 8);
        $monthNumber = substr($trajects[$i]['jour_voyage'], 5, 2);
        $month = $trajet->checkMonth($monthNumber);
        if($trajects[$i]['aller_retour'] == 'on') {
            $arrow = 'assets/img/go-return.svg';
        }
        elseif($trajects[$i]['aller_retour'] != 'on'){
            $arrow = 'assets/img/arrow-up.svg';
        }
    
        echo '
        <div class="infoTrajet mg-20 ">
            <div class="dateTrajet">
                <h2 class="day">'.$day.'</h2>
                <h2 class="arrivePlace">'.$month.'</h2>
            </div>
            <div class="placesTrajet">
                <h2 class="departPlace">'.$trajects[$i]['depart'].'</h2>
                <h2 class="arrivePlace">'.$trajects[$i]['destination'].'</h2>
            </div>
            <div class="go-return">
                <img src="'.$arrow.'" alt="">
            </div>
            <form action="" class="none edit-delete-form" >
                <a href="edit_trajet.php?edit='.$trajects[$i]["id_trajet"].'" class="btnEdit">EDITER</a>
                <a href="delete.php?supp='.$trajects[$i]["id_trajet"].'" class="btnDel">SUPPRIMER</a>
            </form>
        </div>';
    }
}
else {
    echo "<h2> Tu n'as ajouté aucun trajet </h2>";
}

?>
    <!-- <div class="infoTrajet mg-20 ">
        <div class="dateTrajet">
            <h2 class="day">05</h2>
            <h2 class="month">MAR</h2>
        </div>

        <div class="placesTrajet">
            <h2 class="departPlace">Dole</h2>
            <h2 class="arrivePlace">Lons le Saunier</h2>
        </div>

        <div class="go-return"><img src="assets/img/go-return.svg" alt=""></div>

        <form action="" class="none edit-delete-form" >
            <a href="#" name="edit" class="btnEdit">EDITER</a>
            <a href="#" name="delete" class="btnDel">SUPPRIMER</a>
        </form>
</div> -->

</div>



<script src="assets/js/del.js"></script>
<script src="assets/js/user.js"></script>
<?php include('footer.php')?>