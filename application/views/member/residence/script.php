<script>
loadSummary();

$(document).ready(function(){
	$(document).on("click", "a#update-vacancy-btn", function(e) {
        e.preventDefault();
				var rid = $(this).attr('data-rid');
        $.ajax({
            url: '<?php echo member_url('residences/updatevacancy');?>'+'/'+rid,
            type:'GET',
            data:'',
            dataType: "json",
            success: function(data){
                $('#modal-wrap').html(data.content);
                $('#residenceVacancyModal').modal({'backdrop':'static'});

            }
        });
    });

    $("#modal-wrap").on("click", "button#submit-update-vacancy-btn", function(e) {
        e.preventDefault();
        var FormElement =  document.querySelector("#residence-vacancy")
        var submitFormData = new FormData(FormElement);
        $('#confirm-box')
      .modal({ backdrop: 'static', keyboard: false })
      .one('click', '#confirm-button', function (e) {
          $.ajax({
              url: '<?php echo member_url('residences/updatevacancysubmit');?>',
              type:'POST',
              data:submitFormData,
              contentType: false,
              processData: false,
              success: function(response){
                var response = JSON.parse(response);
                if(response.status=="1"){
                    $('#residenceVacancyModal').modal('hide');
                    loadSummary();
                } else {
                    $(".validation-errors").html(response.data);
                }
              }
          });
      });
    });

		$(document).on("click", "a#view-residence-btn", function(e) {
	        e.preventDefault();
					var rid = $(this).attr('data-rid');
	        $.ajax({
	            url: '<?php echo member_url('residences/viewdetails');?>'+'/'+rid,
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

	function loadSummary(){
		var certificateUrl = '<?php echo member_url('membership/certificatepreview');?>';
		$.ajax({
				url: '<?php echo member_url('residences/loadsummary');?>',
				type:'GET',
				data:'',
				dataType: "json",
				success: function(data){
						$('#residence-summary').html(data.content);

				}
		});
	}
</script>
