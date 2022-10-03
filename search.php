<?php include('head.php');
require_once("./class/user.php");

if(!isset($_SESSION['name_user'])){
    header("Location:./index.php");
}

if(isset($_GET['search'])) {
    $depart = $_GET['depart'];
    $destination = $_GET['destination'];
    $jour_voyage = $_GET['date'];
    if(isset($_GET['retour'])){
        $aller_retour = $_GET['retour'];
    }
    if(isset($_GET['allez'])) {
        $aller_retour = 'off';
    }
    $_SESSION['search'] = [$depart, $destination, $jour_voyage, $aller_retour];
    header('Location: ./list.php');
}

include('./homepc.php');
?>

<div class="mainSearch">
    <?php include('navbar.php');?>


    <div class="form-container">
        <h1>RECHERCHER UN TRAJET</h1>
        <form action="" method="get" class="searchForm autocomplete-container" id="autocomplete-container">

            <div class="departBox">

                <img src="assets/img/markerMap.svg" alt="">
                <input type="text" placeholder="Départ" name="depart" id='inputDepart' required>
            </div>

            <div class="departBox">
                <img src="assets/img/markerMap.svg" alt="">
                <select name="destination" id="" required>

                    <option value="" disabled selected hidden>
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

            <div class="departBox">
                <img src="assets/img/calendar.svg" alt="">
                <input type="date" name="date" class="date" required>
            </div>


            <div class="optionFlex-row">
                <div class="optionAdd">
                    <input type="checkbox" id="allez" name="allez" checked>
                    <label for="allez">Allez</label>
                </div>

                <div class="optionAdd">
                    <input type="checkbox" id="retour" name="retour">
                    <label for="retour">Allez/Retour</label>
                </div>
            </div>
            <input type="submit" name="search" class="searchBtn" value="RECHERCHER">
        </form>
    </div>


</div>

<script src="assets/js/test.js"></script>
<script src="assets/js/autocomplete.js"></script>
<script src="assets/js/user.js"></script>

<?php include('footer.php')?>