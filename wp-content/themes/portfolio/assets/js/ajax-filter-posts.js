jQuery(document).ready(function($) {


    $('.portfolio-filter').click( function(event) {

        if (event.preventDefault) {
            event.preventDefault();
        } else {
            event.returnValue = false;
        }

        var portfolio_categories = $(this).attr('title');

        data = {
            action: 'filter_posts',
            afp_nonce: afp_vars.afp_nonce,
            post_type: "portfolio",
            portfolio_categories: portfolio_categories,
        };

        $.ajax({
            type: "post",
            dataType: "json",
            url: afp_vars.afp_ajax_url,
            data: data,
            success: function(data, textStatus, XMLHttpRequest) {
                console.log(data);
                $('.portfolio-results').fadeOut()
                    .queue(function(n) {
                        $(this).html(data.response);
                        n();
                    }).fadeIn();
            },
            error: function( XMLHttpRequest, textStatus, errorThrown ) {
                $('.portfolio-results').fadeOut()
                    .queue(function(n) {
                        $(this).html("No items found. ");
                        n();
                    }).fadeIn();
            }
        });
    });

});