<?php
    if ( !is_admin() ) {
        wp_deregister_script( 'jquery' );
        wp_register_script( 'jquery', '/wp-includes/js/jquery/jquery.js', '3.6.0', TRUE );
        wp_enqueue_script('jquery' );
    }

function before_afters( $atts ) {
    if( isset($_GET['page']) || isset($_GET['page']) == "ba_options" ) {
        return;
    }
    ob_start();
    if ( sizeof($atts) == 1 && implode("|", $atts )  !== 'all' ) {
        $limit = implode("|", $atts );
    } else {
        $limit = 50;
    }

    global $wpdb;
    $ba_image_links = $wpdb -> get_results( "SELECT * FROM `" . $wpdb->prefix . "before_after`". " LIMIT " . $limit );
?>
    <div class="">
        <div class="row">
            <?php
                if (sizeof($ba_image_links) == 0) {
                    echo '<p>No Before After images added to the gallery.</p>';
                } else {

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
            <img id="main" />
            <div class="resize">
                <img id="compare" />
            </div>
            <span class="handle"></span>
        </div>
    </div>
            <?php
                }
            ?>
<?php
    return ob_get_clean();
}