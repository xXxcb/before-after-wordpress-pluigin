<?php

function ba_plugin_opts_page() {
    if ( isset($_COOKIE['before']) && isset($_COOKIE['after']) ) {
        unset($_COOKIE['before']);
        unset($_COOKIE['after']);
    }
    if ( isset($_POST['delete']) ) {
        $id = $_POST['delete'];
        global $wpdb;

        $table = 'before_after';
        $wpdb->delete( $wpdb->prefix . $table, array( 'ID' => $id ) );
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
                      title: "Before/After pair deleted successfully."
                    })
            </script>
        ';
    }
    global $wpdb;
    $ba_image_links = $wpdb -> get_results( "SELECT * FROM `" . $wpdb->prefix . "before_after`" );
?>
        <div class="wrap">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-12">
                        <div class="card shadow mr-6" style="max-width: inherit;">
                            <h3 class="card-title border-bottom"><?php _e('List of Image Links', 'ba'); ?></h3>
                            <div class="card-body" style="max-height: 1200px !important; overflow-x: scroll !important;">
                                <?php
                                    foreach ( $ba_image_links as $link ) {
                                ?>
                                    <div class="card" style="max-width: inherit;">
                                        <div class="card-body">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-6 col-md-6 p-1">
                                                        <a class="d-block image-scale text-decoration-none heading-highlight text-center">
                                                            <div class="image-inner mb-1 rounded">
                                                                <img src="<?php echo $link -> before_img ?>" alt="Category image">
                                                            </div>
                                                            <h3 class="h5 mb-3">Before</h3>
                                                        </a>
                                                    </div>
                                                    <div class="col-6 col-md-6 p-1">
                                                        <a class="d-block image-scale text-decoration-none heading-highlight text-center">
                                                            <div class="image-inner mb-1 rounded">
                                                                <img src="<?php echo $link -> after_img ?>" alt="Category image">
                                                            </div>
                                                            <h3 class="h5 mb-3">After</h3>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 col-md-12 d-flex justify-content-center">
                                                        <form method="post">
                                                            <button type="submit" name="delete" class="btn btn-outline-danger btn-icon" value="<?php echo $link -> ID ?>">
                                                                <i class="dashicons dashicons-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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