<?php include('head.php');
include('./homepc.php');
require_once("./class/Trajects.php");
$trajet = new Trajects($_SESSION['name_user']);
if(isset($_GET['destroy'])) {
    $trajet->cancelTraject($_GET['id_trajet']);
}
?>

<div class="cancelMain">
    <?php include('navbar.php')?>
    <h1>ANNULATION</h1>
    <p> Etes vous sur de vouloir annuler cette réservation?</p>
 
        <form action="" method="GET">
            <input type="hidden" name="id_trajet" value="<?php if(isset($_GET['cancel'])) {echo $_GET['cancel'];} ?>">
            <div class="ipDelConfirm">
            <input type='submit' name="destroy" value="ANNULER MA RESERVATION"  class="cancelBtn">
        </form>
    <div class="cancelReturn">
        <a href="./reservations.php">RETOUR</a>
    </div>
</div>

<script src="assets/js/user.js"></script>
<?php include('footer.php') ?>