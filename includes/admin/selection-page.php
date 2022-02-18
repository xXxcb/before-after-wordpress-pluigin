<?php

function ba_plugin_select_page() {

    global $wpdb;

// Save attachment to DB
    if ( isset( $_POST['submit_image_selector'] ) && isset( $_POST['image_attachment_id_before'] ) && isset( $_POST['image_attachment_id_after'] ) ) {

        if ( isset($_COOKIE['before']) && isset($_COOKIE['after']) ) {
            $before = $_COOKIE['before'];
            $after = $_COOKIE['after'];

            $sql= 'INSERT INTO ' . $wpdb->prefix . "before_after" . ' (' ."before_img, ". "after_img". ') ' . 'VALUES ' . '(' . '"' .$before. '"' .', ' . '"'.$after.'"' . ')';

            $db_query_insert = $wpdb->query( $sql );

            if ( $db_query_insert === 1 ) {
                echo '
                <script type="text/javascript">
                    const Toast = Swal.mixin({
                          toast: true,
                          position: "center-end",
                          showConfirmButton: false,
                          timer: 2000,
                        })
                        
                        Toast.fire({
                          icon: "success",
                          title: "Before/After images added successfully."
                        })
                </script>
            ';
            } else {
                $message = '<div class="alert alert-error" role="alert">DB error!</div>';
            }

            unset($_COOKIE['before']);
            unset($_COOKIE['after']);

        } else {
            echo '
            <script type="text/javascript">
                const Toast = Swal.mixin({
                      toast: true,
                      position: "center-end",
                      showConfirmButton: false,
                      timer: 2000,
                    })
                    
                    Toast.fire({
                      icon: "warning",
                      title: "Please select a before and after picture."
                    })
            </script>
        ';
        }
    }

    wp_enqueue_media();
?>

    <div class="wrap">
        <h3 class=""><?php _e('Select a Pair of Images', 'ba'); ?></h3>
        <div class="container">
            <form method='post'>
                <div class="row">
    <!--                Before-->
                    <div class="col-6 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title"><?php _e('Before', 'ba'); ?></h3>
                                    <div class='image-preview-wrapper'>
                                        <img id='image-preview_before' src='<?php echo wp_get_attachment_url( get_option( 'media_selector_attachment_id_before' ) );  ?>' height='100'>
                                    </div>
                                    <input id="upload_image_button_before" type="button" class="button mt-2" value="<?php _e( 'Select an image' ); ?>" />
                                    <input type='hidden' name='image_attachment_id_before' id='image_attachment_id_before' value='<?php echo get_option( 'media_selector_attachment_id_before' ); ?>'>
                            </div>
                        </div>
                    </div>

    <!--                After-->
                    <div class="col-6 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title"><?php _e('After', 'ba'); ?></h3>
                                    <div class='image-preview-wrapper'>
                                        <img id='image-preview_after' src='<?php echo wp_get_attachment_url( get_option( 'media_selector_attachment_id_after' ) ); ?>' height='100'>
                                    </div>
                                    <input id="upload_image_button_after" type="button" class="button mt-2" value="<?php _e( 'Select an image' ); ?>" />
                                    <input type='hidden' name='image_attachment_id_after' id='image_attachment_id_after' value='<?php echo get_option( 'media_selector_attachment_id_after' ); ?>'>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-6 d-flex justify-content-center">
                <div class="col-12 col-md-3 col-lg-3">
                    <button type="submit" name="submit_image_selector" class="btn btn-block btn-outline-success">Save</button>
                </div>
            </div>
            </form>
        </div>

    </div>

    <?php
}

add_action( 'admin_footer', 'media_selector_print_scripts' );

function media_selector_print_scripts() {
    ?>
    <script type='text/javascript'>
        jQuery( document ).ready( function( $ ) {

            // Uploading files
            let file_frame;

            jQuery('#upload_image_button_before').on('click', function( event ) {

                event.preventDefault();

                // Create the media frame.
                file_frame = wp.media.frames.file_frame = wp.media({
                    title: 'Select a image to upload',
                    button: {
                        text: 'Use this image',
                    },
                    multiple: false	// Set to true to allow multiple files to be selected
                });

                // When an image is selected, run a callback.
                file_frame.on( 'select', function() {
                    // We set multiple to false so only get one image from the uploader
                    let attachment = file_frame.state().get('selection').first().toJSON();

                    // Do something with attachment.id and/or attachment.url here
                    $( '#image-preview_before' ).attr( 'src', attachment.url ).css( 'width', 'auto' );
                    $( '#image_attachment_id_before' ).val( attachment.id );

                    document.cookie = `before=${attachment.url};`
                });

                // Finally, open the modal
                file_frame.open();
            });

            jQuery('#upload_image_button_after').on('click', function( event ) {

                event.preventDefault();

                // Create the media frame.
                file_frame = wp.media.frames.file_frame = wp.media({
                    title: 'Select a image to upload',
                    button: {
                        text: 'Use this image',
                    },
                    multiple: false	// Set to true to allow multiple files to be selected
                });

                // When an image is selected, run a callback.
                file_frame.on( 'select', function() {
                    // We set multiple to false so only get one image from the uploader
                    attachment = file_frame.state().get('selection').first().toJSON();

                    // Do something with attachment.id and/or attachment.url here
                    $( '#image-preview_after' ).attr( 'src', attachment.url ).css( 'width', 'auto' );
                    $( '#image_attachment_id_after' ).val( attachment.id );

                    let date = new Date();
                    date.setTime(date.getTime()+(5*60*1000));

                    document.cookie = `after=${attachment.url};`
                });

                // Finally, open the modal
                file_frame.open();
            });
        });

    </script>
    <?php

}

function clearCookies() {
   if ( !headers_sent() ) {


   }
}