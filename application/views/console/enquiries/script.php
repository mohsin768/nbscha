<script>

$(document).ready(function(){

		$(document).on("click", "a#view-residence-btn", function(e) {
	        e.preventDefault();
					var rid = $(this).attr('data-rid');
	        $.ajax({
	            url: '<?php echo admin_url('residences/view');?>'+'/'+rid,
	            type:'GET',
	            data:'',
	            dataType: "json",
	            success: function(data){
	                $('#modal-wrap').html(data.content);
	                $('#residenceDetailsModal').modal({'backdrop':'static'});

	            }
	        });
	    });

	});


</script>
