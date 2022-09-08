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
                <input type="text" placeholder="Départ" id='inputDepart'>
                <input type="text" placeholder="Destination">
                <input type="date">
                <input type="submit" class="searchBtn" value="RECHERCHER">
            </form>
        </div>

 
    </div>

    
    <script src="assets/js/map.js"></script>
    <script src="assets/js/user.js"></script>
</body>


</html>