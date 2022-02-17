<?php

function before_afters() {
    if( isset($_GET['page']) || isset($_GET['page']) == "ba_options"  ) {
        return;
    }
    ob_start();

    global $wpdb;
    $ba_image_links = $wpdb -> get_results( "SELECT * FROM `" . $wpdb->prefix . "before_after`" );
?>

    <div class="wrap">
        <div class="row">

            <?php
                foreach ( $ba_image_links as $link ) {
            ?>
                <div class="column">
                    <img class="sample" src="<?php echo $link -> before_img ?>" style="width:100%" onclick="myFunction( <?php echo htmlspecialchars(json_encode($link))  ?>) "  />
                </div>
            <?php
                }
            ?>
        </div>

        <div id="container">
            <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>

            <div class="img-comp-container">
                <div class="img-comp-img">
                    <img id="main" class="image_class">
                </div>
                <div class="img-comp-img img-comp-overlay">
                    <img id="compare" class="image_class">
                </div>
            </div>
        </div>
    </div>

<?php
    return ob_get_clean();
}