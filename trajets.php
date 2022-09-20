<?php include('head.php')?>
<?php include('navbar.php');
require_once("./class/Trajects.php");

$trajet = new Trajects($_SESSION['name_user']);
$trajects = $trajet->getTrajectData($trajet->idUser);
?>
<div class="mainReservation">
    
    <h1>MES TRAJETS</h2>

<?php

for ($i=0; $i < count($trajects); $i++) {
    $day = substr($trajects[$i]['jour_voyage'], 8);
    $month = substr($trajects[$i]['jour_voyage'], 5, 2);
    if($month == '01') {
        $month = 'JAN';
    } elseif($month == '02') {
        $month = 'FEV';
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
        $month = 'SEP';
    }elseif($month == '10') {
        $month = 'OCT';
    }elseif($month == '11') {
        $month = 'NOV';
    }elseif($month == '12') {
        $month = 'DEC';
    }
    echo '<div class="infoTrajet mg-20 "><div class="dateTrajet"><h2 class="day">'.$day.'</h2><h2 class="arrivePlace">'.$month.'</h2></div><div class="placesTrajet"><h2 class="departPlace">'.$trajects[$i]['depart'].'</h2><h2 class="arrivePlace">'.$trajects[$i]['destination'].'</h2></div><div class="go-return"><img src="assets/img/go-return.svg" alt=""></div><form action="" class="none edit-delete-form" ><a href="edit_trajet.php?edit='.$trajects[$i]["id_trajet"].'" class="btnEdit">EDITER</a><a href="delete.php?supp='.$trajects[$i]["id_trajet"].'" class="btnDel">SUPPRIMER</a></form></div>';
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