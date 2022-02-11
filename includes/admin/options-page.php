<?php

function ba_plugin_opts_page() {

    ?>
    <div class="wrap">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title"><?php _e('List of Image Links', 'ba'); ?></h3>
                            <?php
                                global $wpdb;
                                $ba_image_links = $wpdb -> get_results( "SELECT * FROM `" . $wpdb->prefix . "before_after`" );
                            ?>

                            <?php
                                foreach ( $ba_image_links as $link ) {
                            ?>
                                 <p><strong>Before: </strong> <?php echo __($link -> before_img); ?> </p>
                                 <p><strong>After: </strong> <?php echo __($link -> after_img); ?> </p>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php
}