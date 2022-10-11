<script src="assets/js/mediaquery.js"></script>
<?php
         

            if($_SERVER['PHP_SELF'] != '/blablacampus/index.php'){
                  
            echo '<script type="text/javascript"> ';
            echo "let indexpc = document.querySelector('.container-index-pc'); ";
            echo  "indexpc.classList.add('none'); ";
            echo "</script> ";
            }    
            
            ?>
</body>
</html>