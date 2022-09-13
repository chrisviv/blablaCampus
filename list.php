<?php include('head.php') ?>
<?php include('navbar.php')?>
<div class="listMain">
    
    <h1>TRAJETS DISPONIBLES</h2>

    <div class="infoTrajet">
        <div class="dateTrajet">
            <h2 class="day">05</h2>
            <h2 class="month">SEP</h2>
        </div>

        <div class="placesTrajet">
            <h2 class="departPlace">Dole</h2>
            <h2 class="arrivePlace">Lons le Saunier</h2>
        </div>

        <div class="go-return"><img src="assets/img/go-return.svg" alt=""></div>
    </div>

    <div class="trajetCount">
        <h2>
            <span class="phpNumber">5</span>
            trajets disponibles
        </h2>

        <div class="clockInfo">
            <img src="assets/img/clock.svg" alt="">
            <h2>Les trajets sont triés chronologiquement par heure de départ.</h2>
        </div>
    </div>

    <div class="card-trajet">
        <h2>PLACES DISPONIBLES 
            <span class="phpNumber">2</span>
        </h2>

        <div class="card-body">
            <div class="travel-start">
                <h3 class="hour">06H30</h3>
                <img src="assets/img/circle-line.svg" alt="">
                <h3 class="place">Dole</h3>
            </div>
            
        <!--     <div class="travel-half">
                <h3 class="hour">06H30</h3>
                <img src="assets/img/circle-line.svg" alt="">
                <h3 class="place">Dole</h3>
            </div> -->
          
            <div class="travel-end">
                <h3 class="hour">07H30</h3>
                <img src="assets/img/circle.svg" alt="">
                <h3 class="place">Lons-le-Saunier</h3>
            </div>
        </div>  
        
        <div class="profile-travel">
         <img src="https://picsum.photos/200/300" alt="Photo de profil">
        
         <div class="user-travel">
             <h2>PHP USERNAME</h2>
             <h3>PHP BIO </h3>
         </div>
       </div>
        

    </div>
    
    <div class="card-trajet">
        <h2>PLACES DISPONIBLES 
            <span class="phpNumber">2</span>
        </h2>

        <div class="card-body">
            <div class="travel-start">
                <h3 class="hour">06H30</h3>
                <img src="assets/img/circle-line.svg" alt="">
                <h3 class="place">Dole</h3>
            </div>

            <div class="travel-half">
                <h3 class="hour">06H30</h3>
                <img src="assets/img/circle-line.svg" alt="">
                <h3 class="place">Dole</h3>
            </div>
          
            <div class="travel-end">
                <h3 class="hour">07H30</h3>
                <img src="assets/img/circle.svg" alt="">
                <h3 class="place">Lons-le-Saunier</h3>
            </div>
        </div>  
        
        <div class="profile-travel">
         <img src="https://picsum.photos/200/300" alt="Photo de profil">
        
         <div class="user-travel">
             <h2>PHP USERNAME</h2>
             <h3>PHP BIO </h3>
         </div>
       </div>
        

    </div>
</div>

<script src="assets/js/user.js"></script>
<?php include('footer.php') ?>