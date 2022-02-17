<?php

function before_afters() {
    if( isset($_GET['page']) || isset($_GET['page']) == "ba_options"  ) {
        return;
    }
    ob_start();
?>

    <div class="">

           <div class="row">
               <div class="">
                   <img class="sample" src="http://beforeafter.local/wp-content/uploads/2022/02/Badge_2.png"  />
               </div>

               <div class="">
                   <img src="http://beforeafter.local/wp-content/uploads/2022/02/Badge_2.png"  />
               </div>
           </div>

    </div>

<?php
    return ob_get_clean();
}