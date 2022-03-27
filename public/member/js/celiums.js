function launchIntoFullscreen(element) {
    if(element.requestFullscreen) {
        element.requestFullscreen();
    } else if(element.mozRequestFullScreen) {
        element.mozRequestFullScreen();
    } else if(element.webkitRequestFullscreen) {
        element.webkitRequestFullscreen();
    } else if(element.msRequestFullscreen) {
        element.msRequestFullscreen();
    }
}
function exitFullscreen() {
    if(document.exitFullscreen) {
        document.exitFullscreen();
    } else if(document.mozCancelFullScreen) {
        document.mozCancelFullScreen();
    } else if(document.webkitExitFullscreen) {
        document.webkitExitFullscreen();
    }
}

function set_sidemenu(){
    var windowHeight = $( window ).height();
    if( windowHeight > 900) {
        if(!$('.left-menu-block').hasClass('menu_fixed')) {
            $('.left-menu-block').addClass('menu_fixed');
        }
    } else {
        if($('.left-menu-block').hasClass('menu_fixed')) {
            $('.left-menu-block').removeClass('menu_fixed');
        }
    }
}

$(document).ready(function(){
    updateNotificationForm();
    $('.notifications-fields-form #notification_type').on('change', function() {
        updateNotificationForm();
    });

    function updateNotificationForm(){
        if($('.notifications-fields-form #notification_type').length){
            var notificationType = $('.notifications-fields-form #notification_type').val();
            $('.notifications-fields-form .ntypes').hide();
            if(notificationType!=''){
                var notificationTypeElement = ".notifications-fields-form #"+notificationType;
                if($(notificationTypeElement).length){
                    $(notificationTypeElement).show();
                }
            }
        }
    }

    updateRegulationForm();
    $('.regulations-fields-form #regulation_type').on('change', function() {
        updateRegulationForm();
    });

    function updateRegulationForm(){
        if($('.regulations-fields-form #regulation_type').length){
            var regulationType = $('.regulations-fields-form #regulation_type').val();
            $('.regulations-fields-form .ntypes').hide();
            if(regulationType!=''){
                var regulationTypeElement = ".regulations-fields-form #"+regulationType;
                if($(regulationTypeElement).length){
                    $(regulationTypeElement).show();
                }
            }
        }
    }

    $('.filter-change').on('change', function() {
        document.forms['commission-filter'].submit();
    });
	$("#top-lang-select").on("change", function () {
		$("#language-form").submit();
	});
    $(".side-menu li.active").parent().addClass("active");
    $(".side-menu ul.active").parent().addClass("active");
    set_sidemenu();
    $('.fullscreen-button').click(function(){
        if( window.innerHeight == screen.height) {
            $(this).children('.glyphicon').removeClass('glyphicon-resize-small');
            $(this).children('.glyphicon').addClass('glyphicon-fullscreen');
            exitFullscreen();
        } else{
            $(this).children('.glyphicon').removeClass('glyphicon-fullscreen');
            $(this).children('.glyphicon').addClass('glyphicon-resize-small');
            launchIntoFullscreen(document.documentElement);
        }
    });

    $('.confirmChange').on('click', function (e) {
        e.preventDefault();
        var url = $(this).attr('href');
        var bodyText = $(this).attr('data-body-text');
        var buttonText = $(this).attr('data-button-text');
        $('#confirm-change-body').html(bodyText);
        $('#delete-change-button').html(buttonText);
        $('#confirm-change')
            .modal({ backdrop: 'static', keyboard: false })
            .one('click', '#delete-change-button', function (e) {
                window.location.href = url;
            });
    });

    $('.confirmAction').on('click', function (e) {
        e.preventDefault();
        var url = $(this).attr('href');
        $('#confirm-action-popup')
            .modal({ backdrop: 'static', keyboard: false })
            .one('click', '#confirm-action-button', function (e) {
                window.location.href = url;
            });
    });

    $('.confirmDelete').on('click', function (e) {
        e.preventDefault();
        var url = $(this).attr('href');
        $('#confirm-delete')
            .modal({ backdrop: 'static', keyboard: false })
            .one('click', '#delete', function (e) {
                window.location.href = url;
            });
    });

    $('.confirmApprove').on('click', function (e) {
        e.preventDefault();
        var url = $(this).attr('href');
        $('#confirm-approve')
            .modal({ backdrop: 'static', keyboard: false })
            .one('click', '#approve', function (e) {
                window.location.href = url;
            });
    });
    $('.confirmCancel').on('click', function (e) {
        e.preventDefault();
        var url = $(this).attr('href');
        $('#confirm-cancel')
            .modal({ backdrop: 'static', keyboard: false })
            .one('click', '#cancel', function (e) {
                window.location.href = url;
            });
    });
    $('.confirmRemove').on('click', function (e) {
         e.preventDefault();

         $('#confirm-remove')
             .modal({ backdrop: 'static', keyboard: false })
             .one('click', '#remove', function (e) {
                $("input#filterDelete").prop("checked", true)
                $('#filter').submit();
     	});
 	});

  $('.confirmAppApprove').on('click', function (e) {
       e.preventDefault();

       $('#confirm-approve')
           .modal({ backdrop: 'static', keyboard: false })
           .one('click', '#approve', function (e) {
              $("input#filterAppApprove").prop("checked", true)
              $('#filter').submit();
    });
});
$('.confirmAppCancel').on('click', function (e) {
    e.preventDefault();
    var url = $(this).attr('href');
    $('#confirm-cancel')
        .modal({ backdrop: 'static', keyboard: false })
        .one('click', '#cancel', function (e) {
          $("input#filterAppCancel").prop("checked", true)
          $('#filter').submit();
        });
});
$('.select_all').click(function () {
        $(this).closest('form').find(':checkbox').prop('checked', this.checked);
        $("input#filterDelete").prop("checked", false);
});

$('.right_col').on('click','a.sort-list-link',function(e){
        e.preventDefault();
        var sortField = $(this).attr('data-sort-field');
        $("#sort_field").val(sortField);
        $("#action_filter").submit();
    });
});

$(window).resize(function(){
    set_sidemenu();
});

$(function() {
    $('#publish_date').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        locale: {
            format: 'DD-MM-YYYY'
        }
    });
    $('#video_date').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        locale: {
            format: 'DD-MM-YYYY'
        }
    });

 $('#start_date').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        locale: {
            format: 'DD-MM-YYYY'
        }
    });

  $('#end_date').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        locale: {
            format: 'DD-MM-YYYY'
        }
    });
  $('#date').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        locale: {
            format: 'DD-MM-YYYY'
        }
    });


});

$(document).ready(function(){

    $('.enquiry-view').click(function(){
        var enquiryId = $(this).data('id');
        $.ajax({
         url: siteBaseUrl+'/enquiries/view',
         type: 'post',
         data: {id: enquiryId},
         success: function(response){
           $('#ajaxModal .modal-body').html(response);
           $('#ajaxModal').modal('show');
         }
       });
    });

    $('.news-view').click(function(){
        var newsId = $(this).data('id');
        var newsLan = $(this).data('lan');
        $.ajax({
         url: siteBaseUrl+'/resources/newsdetails',
         type: 'post',
         data: {id: newsId,language:newsLan},
         success: function(response){
           $('#ajaxModal .modal-body').html(response);
           $('#ajaxModal').modal('show');
         }
       });
    });

    $('.arequest-view').click(function(){
        var enquiryId = $(this).data('id');
        $.ajax({
         url: siteBaseUrl+'/arequests/view',
         type: 'post',
         data: {id: enquiryId},
         success: function(response){
           $('#ajaxModal .modal-body').html(response);
           $('#ajaxModal').modal('show');
         }
       });
    });

    $('.srequest-view').click(function(){
        var enquiryId = $(this).data('id');
        $.ajax({
         url: siteBaseUrl+'/srequests/view',
         type: 'post',
         data: {id: enquiryId},
         success: function(response){
           $('#ajaxModal .modal-body').html(response);
           $('#ajaxModal').modal('show');
         }
       });
    });

    $('.booking-view').click(function(){
      var regiserId = $(this).data('id');
      $.ajax({
       url: siteBaseUrl+'/bookings/view',
       type: 'post',
       data: {id: regiserId},
       success: function(response){
         $('#ajaxModal .modal-body').html(response);
         $('#ajaxModal').modal('show');
       }
     });
    });

});
