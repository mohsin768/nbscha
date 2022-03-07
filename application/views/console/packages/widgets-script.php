<script src="<?php echo admin_assets_url('js/jquery-ui.js'); ?>"></script>
<script>
  $( function() {
    $( "#package-boxes,#available-boxes" ).sortable({
      connectWith: ".connectedSortable"
    }).disableSelection();
    $('#update-package-widgets').click(function(e){
        e.preventDefault();
        var packageboxes = $("#package-boxes").sortable('toArray', { attribute: 'data-widget-id' });
        $("#packageboxes").val(packageboxes);
        $("#update-package-widgets-form").submit();
    });

  } );
  </script>