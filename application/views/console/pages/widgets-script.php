<script src="<?php echo admin_assets_url('js/jquery-ui.js'); ?>"></script>
<script>
  $( function() {
    $( "#page-boxes,#available-boxes" ).sortable({
      connectWith: ".connectedSortable"
    }).disableSelection();
    $('#update-page-widgets').click(function(e){
        e.preventDefault();
        var pageboxes = $("#page-boxes").sortable('toArray', { attribute: 'data-widget-id' });
        $("#pageboxes").val(pageboxes);
        $("#update-page-widgets-form").submit();
    });

  } );
  </script>