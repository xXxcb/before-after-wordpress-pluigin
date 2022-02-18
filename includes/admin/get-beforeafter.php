<?php

function before_afters() {
    if( isset($_GET['page']) || isset($_GET['page']) == "ba_options" ) {
        return;
    }
    ob_start();

    global $wpdb;
    $ba_image_links = $wpdb -> get_results( "SELECT * FROM `" . $wpdb->prefix . "before_after`" );
?>
    <div class="">
        <div class="row">
            <?php
                foreach ( $ba_image_links as $link ) {
            ?>
                <div class="column">
                    <img class="sample" src="<?php echo $link -> before_img ?>" style="width:100%" onclick="myFunction( <?php echo htmlspecialchars(json_encode($link)) ?> )" />
                </div>
            <?php
                }
            ?>
        </div>

        <div class="ba-slider">
            <img id="main" alt="Main Image" />
            <div class="resize">
                <img id="compare" alt="Compare Image" />
            </div>
            <span class="handle"></span>
        </div>
    </div>

<?php
    return ob_get_clean();
}