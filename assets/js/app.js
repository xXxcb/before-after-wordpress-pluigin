jQuery(document).ready(function($) {
        jQuery('#q_data').DataTable ({
              "bLengthChange": false,
              "bAutoWidth" : true,
		      "bProcessing": true,
			  "bServerSide": false,
			url : datatablesajax.ajaxurl
            });
    });