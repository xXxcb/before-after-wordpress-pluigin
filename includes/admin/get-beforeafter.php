<?php

function before_afters() {
    if( isset($_GET['page']) || isset($_GET['page']) == "ba_options"  ) {
        return;
    }
?>
    <div class="wrap">
       <div class="container">
           <div class="row">
               <div class="col-12 col-md-3 col-lg-3">
                   <img src="http://beforeafter.local/wp-content/uploads/2022/02/Badge_2.png" width="100" />
               </div>
           </div>
       </div>
    </div>


<?php
}

