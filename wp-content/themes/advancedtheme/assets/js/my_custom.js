(function($) {
    $(document).ready(function() {

        $("#at-btn-ajax").click( function(e) {
            e.preventDefault();

            $.ajax({
                type : "post",
                dataType : "json",
                url : OBJ.ajaxurl,
                data : {
                    action: "my_ajax_action"
                },
                success: function(response) {
                    if( response.type == "success" ) {
                        // Success Message
                    }
                    else {
                        // Error on Failure.
                    }
                }
            });
        });
    });
})(jQuery);