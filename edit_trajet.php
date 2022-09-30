<?php include('head.php');
require_once("./class/trajects.php");

$trajet = new Trajects($_SESSION['name_user']);
if(isset($_GET['edit'])){
    $_SESSION['id_trajet'] = $_GET['edit'];
    $data = $trajet->getTrajectDataByID($_GET['edit']);
}
if(isset($_GET['editTraject'])) {
    $_SESSION['id_trajet'] = $_GET['id_trajet'];
    var_dump($_SESSION['id_trajet']);
    $id = $_SESSION['id_trajet'];
    $depart = $_GET['depart'];
    $destination = $_GET['destination'];
    $jour_voyage = $_GET['jour_voyage'];
    $heure_depart = $_GET['hdepart'];
    if(isset($_GET['retour'])) {
        $allerRetour = $_GET['retour'];
    }
    else {
        $allerRetour = 'off';
    }
    $nbPassagers = $_GET['places'];
    if(isset($_GET['etapes'])) {
        $step1 = $_GET['etapes'];
    }
    else {
        $step1 = '';
    }
    if(isset($_GET['etapes1'])) {
        $step2 = $_GET['etapes1'];
    }
    else {
        $step2 = '';
    }
    if(isset($_GET['etapes2'])) {
        $step3 = $_GET['etapes2'];
    }
    else {
        $step3 = '';
    }
    $trajet->editTraject($id, $depart, $destination, $jour_voyage, $heure_depart, $allerRetour, $nbPassagers, $step1, $step2, $step3);
}

include('./homepc.php');

?>

<div class="mainAdd">
<?php include('navbar.php');?>


    <form action="" method="get" class="formAdd" id='formAdd'>
        <input type="hidden"  name="id_trajet" value="<?php echo $_GET['edit']; ?>">
        <input type="hidden"  name="hide_etape2" value="<?php if(isset($data['etape_2'])){echo $data['etape_2'];} ?>" id='hide_etape2'>
        <input type="hidden"  name="hide_etape3" value="<?php if(isset($data['etape_3'])){echo $data['etape_3'];} ?>" id='hide_etape3'>
        <h1>EDITER UN TRAJET</h1>

        <h3>D’où partez vous?</h3>

        <div class="addBox  autocomplete-container" id="container-add">

            <img src="assets/img/markerMap.svg" alt="">
            <input type="text" placeholder="Départ" name="depart" id='inputDepart2' value="<?php echo $data['depart'] ?>">
        </div>

        <h3>A quelle heure partez -vous?</h3>

        <div class="addBox">
            <img src="assets/img/clock.svg" alt="">
            <input type="time" name="hdepart" id='inputDepart' value="<?php echo $data['heure_depart'] ?>">
        </div>

        <h3>Pour aller où?</h3>

        <div class="addBox">
            <img src="assets/img/markerMap.svg" alt="">
            <select name="destination" id="">

                <?php 
                if(isset($data['destination'])){
                    echo "<option value='".$data['destination']."' selected hidden class='bold'>". $data['destination'] ."</option>";
                }
                ?>    


                <option value="Centre avenue du stade">
                    Centre avenue du stade
                </option>

                <option value="Campus numérique">
                    Campus numérique
                </option>

            </select>
        </div>

        <h3>Quand partez vous?</h3>

        <div class="addBox">
            <img src="assets/img/calendar.svg" alt="">
            <input type="date" name="jour_voyage" class="date" value="<?php echo $data['jour_voyage'] ?>">
        </div>

        <h3>Type de trajet</h3>
        
        <div class="optionFlex-row">
            <div class="optionAdd">
                <input type="checkbox" id="allez" name="allez" <?php if($data['aller_retour'] != 'on') {echo 'checked';}?>>
                <label for="allez">Allez</label>
            </div>
            
            <div class="optionAdd"> 
                <input type="checkbox" id="retour" name="retour" <?php if($data['aller_retour'] == 'on') {echo 'checked';}?>>
                <label for="retour">Allez/Retour</label>
            </div>
        </div>

        <h3>Nombre de place disponibles</h3>

        <div class="addBox">
            <img src="assets/img/places.svg" alt="">
            <input type="number" min="1" max="4" name="places" placeholder="Places disponibles (max: 4)" value="<?php echo $data['nb_voyageurs'] ?>">

           
        </div>

        <h3>Etapes éventuelles</h3>

      <div class="etapes-row autocomplete-container auto-complete-array">
          <div class="etapeSearchBox">
              <img src="assets/img/markerMap.svg" alt="">
              <input type="text" name="etapes"  placeholder="Etape" class="input-etape" value="<?php echo $data['etape_1'] ?>">
        
          </div>  
        
          <img src="assets/img/btnAdd.svg" alt="" class="btnAdd">
      </div>



        <input class='submitTs' type="submit" name="editTraject" value="METTRE A JOUR">
    </form>


</div>




<script src="assets/js/autocomplete3.js"></script>
<script src="assets/js/user.js"></script>
<?php include('footer.php')?>