<?php include('head.php');
require_once("./class/User.php");

if(!isset($_SESSION['name_user'])){
    header("Location:./index.php");
}

include('homePc.php')
?>

    <div class="mainSearch">
      <?php include('navbar.php');?>


        <div class="form-container">
            <h1>RECHERCHER UN TRAJET</h1>
            <form action="" class="searchForm autocomplete-container" id="autocomplete-container">

                <div class="departBox">

                    <img src="assets/img/markerMap.svg" alt="">
                    <input type="text" placeholder="Départ" name="" id='inputDepart' required>
                </div>

               <div class="departBox">
                    <img src="assets/img/markerMap.svg" alt="">
                 <select name="" id="" required>
                    
                      <option value="" disabled selected hidden>
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


               <div class="departBox">
                <img src="assets/img/calendar.svg" alt="">
                 <input type="date" name="" class="date" required>
               </div>
                <input type="submit" name="" class="searchBtn" value="RECHERCHER">
            </form>
        </div>


    </div>

    
    <script src="assets/js/autocomplete.js"></script>
    <script src="assets/js/user.js"></script>

<?php include('footer.php')?>