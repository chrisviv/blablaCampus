<?php include('head.php');
require_once("./class/Trajects.php");

if(isset($_GET['addTraject'])) {
    $trajet = new Trajects($_SESSION['name_user']);
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
    $trajet->newTraject($depart, $destination, $jour_voyage, $heure_depart, $allerRetour, $nbPassagers, $step1, $step2, $step3);
}

include('./homepc.php');
?>

<div class="mainAdd">
    <?php include('navbar.php');?>

    <form action="" method="get" class="formAdd" id='formAdd'>

        <h1>PROPOSER UN TRAJET</h1>

        <h3>D’où partez vous?</h3>

        <div class="addBox  autocomplete-container" id="container-add">

            <img src="assets/img/markerMap.svg" alt="">
            <input type="text" placeholder="Départ" name="depart" id='inputDepart2' required>
        </div>

        <h3>A quelle heure partez-vous?</h3>

        <div class="addBox">
            <img src="assets/img/clock.svg" alt="">
            <input type="time" placeholder="Départ" name="hdepart" id='inputDepart' required>
        </div>

        <h3>Pour aller où?</h3>

        <div class="addBox">
            <img src="assets/img/markerMap.svg" alt="">
            <select name="destination" id="">

                <option value="" disabled selected hidden class="bold">
                    Destination
                </option>


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
            <label for="date" class="flex">
            <img src="assets/img/calendar.svg" alt="">
            <input type="date" name="jour_voyage" class="date" id="date" required>
            </label>
        </div>



    


        <h3>Type de trajet</h3>
        
        <div class="optionFlex-row">
            <div class="optionAdd">
                <input type="checkbox" id="allez" name="allez">
                <label for="allez">Allez</label>
            </div>
            
            <div class="optionAdd"> 
                <input type="checkbox" id="retour" name="retour">
                <label for="retour">Allez/Retour</label>
            </div>
        </div>

        <h3>Nombre de place disponibles (max: 4)</h3>

        <div class="addBox">
            <img src="assets/img/places.svg" alt="">
            <input type="number" min="1" max="4" name="places" placeholder="Places disponibles">

           
        </div>

        <h3>Etapes éventuelles (max: 3)</h3>

      <div class="etapes-row autocomplete-container auto-complete-array">
          <div class="etapeSearchBox">
              <img src="assets/img/markerMap.svg" alt="">
              <input type="text" name="etapes"  placeholder="Etape" class="input-etape" value="">
        
          </div>  
        
          <img src="assets/img/btnAdd.svg" alt="" class="btnAdd">
      </div>



        <input class='submitTs' type="submit" name="addTraject" value="PROPOSER UN TRAJET">
    </form>


</div>




<script src="assets/js/autocomplete.js"></script>
<script src="assets/js/user.js"></script>
<?php include('footer.php')?>