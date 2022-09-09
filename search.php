<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlaBlaCampus</title>
    <link rel="icon" type="image/x-icon" href="assets/img/bbcLogo.svg">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="mainSearch">
        <?php include('header.php');?>


        <div class="form-container">
            <h1>RECHERCHER UN TRAJET</h1>
            <form action="" class="searchForm autocomplete-container" id="autocomplete-container">
                <input type="text" placeholder="Départ" name="" id='inputDepart'>
                <select name="" id="">

                    <option value="adresse">Centre avenue du stade</option>
                    <option value="adresse2">Campus numérique</option>
                </select>
                <input type="date" name="">
                <input type="submit" name="" class="searchBtn" value="RECHERCHER">
            </form>
        </div>


    </div>

    
    <script src="assets/js/map.js"></script>
    <script src="assets/js/user.js"></script>
</body>


</html>