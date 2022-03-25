    // Tabs
    (function ($) {
        var residencesParams = {page:'1'};
        if($('#residences-list').length){
            loadResidences(residencesParams);
        }
        $('#residences-load-more').click( function(){
            $('#residences-load-more').addClass('loading');
            residencesParams.page = parseInt(residencesParams.page)+parseInt("1");
            loadResidences(residencesParams);
        });
        function processResidencesList(result) {
            var residences_template = $('#residences-item-tpl').html();
            var output = '';
            $.each(result.data, function (i, row) {
                row.index = i+1;
                output = output + Mustache.render(residences_template, row);
            });
            if(output==''){
                output = $('#no-residences-tpl').html();
            }
            return output;
        }

        function loadResidences(params){
            if(siteBaseUrl!=''){
                var output = '';
                var residencesUrl = siteBaseUrl+'ajax/residences/index';
                $.getJSON(residencesUrl, function(result){
                    output = processResidencesList(result);
                    $('.no-residences').remove();
                    $('#residences-list').append(output);
                    $('#residences-load-more').removeClass('loading');
                    $('#residences-list').removeClass('loading');
                    if(result.pager.current_page<(result.pager.pages)){
                        $('#residences-load-more').show();
                    } else {
                        $('#residences-load-more').hide();
                    }
                });
            }
        }
    })(jQuery);