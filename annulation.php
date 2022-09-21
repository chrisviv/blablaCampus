<?php include('head.php');
include('homePc.php');
?>

<div class="cancelMain">
    <?php include('navbar.php')?>
    <h1>ANNULATION</h1>
    <p> Etes vous sur de vouloir annuler cette réservation?</p>
 
    <div class="cancelBtn" id="cancelBtn">
        <a href="list.php">
            <button>ANNULER MA RESERVATION</button>
        </a>
    </div>
    <div class="cancelReturn">
        <p>RETOUR</p>
    </div>
</div>

<script src="assets/js/user.js"></script>
<?php include('footer.php') ?>