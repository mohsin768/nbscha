    // Tabs
    (function ($) {
        var residencesParams = {page:'0','language_id':'','region_id':'','package_id':'','level_id':'','facilities':'','vacancy':'','residence_name':'','features':''};
        if($('#residences-list').length){
            loadResidences(residencesParams);
        }
        $('#residence-advanced-search').click( function(e){
            e.preventDefault();
            $('#features-filter').show();
            $('#residence-advanced-search-wrap').hide();
            $('.search-labels').hide();
        });
        $('#residences-pagination-wrap').on('click',".page-link",function(e){
            e.preventDefault();
            var page = $(this).attr('data-page');
            if(page!=''){
                residencesParams.page = page;
                loadResidences(residencesParams);
            }
        });
        $('#propertiesDetailsSlider .carousel-inner .carousel-item:first').addClass('active');
        $('#residence-search').click( function(e){
            e.preventDefault();
            $('#residences-list').addClass('loading');
            $('#residences-load-more').hide();
            residencesParams.page = 0;
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

        function processResidencePagination(result){
            var pagination_template = $('#residences-pagination-tpl').html();
            var output = '';
            var pager = result.pager;
            var pagination = {};
            pagination.showPagination = true;
            pagination.showFirst = true;
            pagination.showPrev = true;
            pagination.showPrevNumber = true;
            pagination.prevPage = 0;
            pagination.prevPageNumber = 1;
            pagination.prevPrevPage = 0;
            pagination.prevPrevPageNumber = 1;
            pagination.currentPageNumber = parseInt(pager.current_page)+1;
            pagination.showLast = true;
            pagination.showNext = true;
            pagination.showNextNumber = true;
            pagination.nextPage = 0;
            pagination.nextPageNumber = 1;
            pagination.nextNextPage = 0;
            pagination.nextNextPageNumber = 1;
            pagination.lastPage = 0;
            pagination.showPrevPrevNumber = true;
            pagination.showNextNextNumber = true;
            if(pager.count==0){
                pagination.showPagination = false;
            } else {
                pagination.lastPage = pager.pages-1;
            }
            if(pager.current_page==0){
                pagination.showFirst = false;
                pagination.showPrev = false;
                pagination.showPrevNumber = false;
            } else {
                pagination.prevPage = pager.current_page-1;
                pagination.prevPageNumber = parseInt(pagination.prevPage)+1;
                pagination.prevPrevPage = pager.current_page-2;
                pagination.prevPrevPageNumber = parseInt(pagination.prevPrevPage)+1;
            }
            if(pager.current_page == (pager.pages-1)){
                pagination.showLast = false;
                pagination.showNext = false;
                pagination.showNextNumber = false;
            } else {
                pagination.nextPage = parseInt(pager.current_page)+1;
                pagination.nextPageNumber = parseInt(pagination.nextPage)+1;
                pagination.nextNextPage = parseInt(pager.current_page)+2;
                pagination.nextNextPageNumber = parseInt(pagination.nextNextPage)+1;
    
            }
            if(pager.pages<=2){
                pagination.showPrevPrevNumber = false;
                pagination.showNextNextNumber = false;
            }
            output = Mustache.render(pagination_template, pagination);
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
                    $('#residences-list').html(output);
                    $('#residences-list').removeClass('loading');
                    var pagination = processResidencePagination(result);
                    $("#residences-pagination-wrap").html(pagination);
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
