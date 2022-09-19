<?php include('head.php');
include('navbar.php');
?>

<div class="mainAdd">


    <form action="" method="" class="formAdd" id='formAdd'>

        <h1>PROPOSER UN TRAJET</h1>

        <h3>D’où partez vous?</h3>

        <div class="addBox  autocomplete-container" id="container-add">

            <img src="assets/img/markerMap.svg" alt="">
            <input type="text" placeholder="Départ" name="" id='inputDepart2'>
        </div>

        <h3>A quelle heure partez -vous?</h3>

        <div class="addBox">
            <img src="assets/img/clock.svg" alt="">
            <input type="time" placeholder="Départ" name="" id='inputDepart'>
        </div>

        <h3>Pour aller où?</h3>

        <div class="addBox">
            <img src="assets/img/markerMap.svg" alt="">
            <select name="" id="">

                <option value="" disabled selected hidden class="bold">
                    Destination
                </option>


                <option value="adresse">
                    Centre avenue du stade
                </option>

                <option value="adresse2">
                    Campus numérique
                </option>

            </select>
        </div>

        <h3>Quand partez vous?</h3>

        <div class="addBox">
            <img src="assets/img/calendar.svg" alt="">
            <input type="date" name="" class="date">
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

        <h3>Nombre de place disponibles</h3>

        <div class="addBox">
            <img src="assets/img/places.svg" alt="">
            <input type="number" min="1" max="4" name="places" placeholder="Places disponibles">

           
        </div>

        <h3>Etapes éventuelles</h3>

      <div class="etapes-row autocomplete-container auto-complete-array">
          <div class="etapeSearchBox">
              <img src="assets/img/markerMap.svg" alt="">
              <input type="text" name="etapes"  placeholder="Etape" class="input-etape">
        
          </div>  
        
          <img src="assets/img/btnAdd.svg" alt="" class="btnAdd">
      </div>



        <input class='submitTs' type="submit" name="" value="PROPOSER UN TRAJET">
    </form>


</div>




<script src="assets/js/autocomplete2.js"></script>
<script src="assets/js/user.js"></script>
<?php include('footer.php')?>