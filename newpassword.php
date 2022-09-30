<?php include('head.php');
include('./homepc.php'); ?>



<div class="mainAdd">
<?php include('navbar.php');?>


    <form action="" method="POST" class="formAdd" id='formAdd'>
        <h1>ENTREZ VOTRE NOUVEAU MOT DE PASSE</h1>

        <div class="addBox  autocomplete-container" id="container-add">

           
            <input type="password" placeholder="Nouveau mot de passe" name="mdp" id='inputDepart2' value="">
        </div>

      

        <div class="addBox">
           
            <input type="password" name="mdpconfirm" id='inputDepart' value="" placeholder="Confimation mot de passe">
        </div>
    </form>
</div>





<?php include('footer.php');?>