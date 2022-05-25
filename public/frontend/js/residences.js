    // Tabs
    (function ($) {
        var residencesParams = {page:'1','language_id':'','region_id':'','package_id':'','level_id':'','facilities':'','vacancy':'','residence_name':'','features':''};
        if($('#residences-list').length){
            loadResidences(residencesParams);
        }
        $('#residence-advanced-search').click( function(e){
            e.preventDefault();
            $('#features-filter').show();
            $('#residence-advanced-search-wrap').hide();
            $('.search-labels').hide();
        });
        $('#residences-load-more').click( function(){
            $('#residences-load-more').addClass('loading');
            residencesParams.page = parseInt(residencesParams.page)+parseInt("1");
            loadResidences(residencesParams);
        });
        $('#propertiesDetailsSlider .carousel-inner .carousel-item:first').addClass('active');
        $('#residence-search').click( function(e){
            e.preventDefault();
            $('#residences-list').addClass('loading');
            $('#residences-load-more').hide();
            residencesParams.page = 1;
            var facilities = $('#residence-facilities').val();
            var facilitiesStr = '';
            if (facilities !== null){
                facilitiesStr = facilities.join(",");
            }
            var features = $("#features-filter input:checkbox:checked").map(function(){
                return $(this).val();
              }).get();
            var featuresStr = '';
            if (features !== null){
                featuresStr = features.join(",");
            }
            residencesParams.language_id = $('#residence-language-id').val();
            residencesParams.region_id = $('#residence-region').val();
            residencesParams.package_id = $('#residence-package').val();
            residencesParams.level_id = $('#residence-level').val();
            residencesParams.facilities = facilitiesStr;
            residencesParams.vacancy = $('#residence-vacancy').val();
            residencesParams.residence_name = $('#residence-name').val();
            residencesParams.features = featuresStr;
            $('.residence-item').remove();
            loadResidences(residencesParams);
        });
        $('#residence-reset').click( function(e){
            e.preventDefault();
            $('#residences-list').addClass('loading');
            $('#residences-load-more').hide();
            residencesParams.page = 1
            $('#residence-language-id').val('');
            $('#residence-region').val('');
            $('#residence-package').val('');
            $('#residence-level').val('');
            $('#residence-facilities').val('');
            $('#residence-vacancy').val('');
            $('#residence-name').val('');
            $('.features-checkbox').prop('checked', false);
            residencesParams.region_id = '';
            residencesParams.package_id = '';
            residencesParams.level_id = '';
            residencesParams.facilities = '';
            residencesParams.vacancy = '';
            residencesParams.residence_name = '';
            residencesParams.features = '';
            $('.residence-item').remove();
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
                var processedParams = cleanObject(params);
                var residencesQueryString = $.param(processedParams);
                var residencesBaseUrl = siteBaseUrl+'ajax/residences/index';
                var residencesUrl = residencesBaseUrl+'?'+residencesQueryString;
                $.getJSON(residencesUrl, function(result){
                    $('.no-residences').remove();
                    if(result.status=='1'){
                        output = processResidencesList(result);
                    } else {
                        output = $('#no-residences-tpl').html();
                    }
                    $('#residences-list').append(output);
                    $('#residences-list').removeClass('loading');
                    $('#residences-load-more').addClass('loading');
                    if(result.pager.current_page<(result.pager.pages)){
                        $('#residences-load-more').show();
                    } else {
                        $('#residences-load-more').hide();
                    }
                });
            }
        }
        function cleanObject(obj) {
            for (var propName in obj) {
              if (obj[propName] === null || obj[propName] === undefined || obj[propName] === '') {
                delete obj[propName];
              }
            }
            return obj;
        }
    })(jQuery);
