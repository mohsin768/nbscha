<script>
$(document).ready(function() {
      $("#request_date").daterangepicker({
      timePicker: false,
        singleDatePicker: true,showDropdowns: true,
          autoUpdateInput: false,
        locale: {format: "DD-MM-YYYY",cancelLabel: 'Clear'},
        calender_style: "picker_4"
      }, function(start_date, end_date) {
					this.element.val(start_date.format("DD-MM-YYYY"));
      });

      $(document).on("click", "a#update-requests-btn", function(e) {
			        e.preventDefault();
							var rid = $(this).attr('data-rid');
			        $.ajax({
			            url: '<?php echo admin_url('requests/edit');?>'+'/'+rid,
			            type:'GET',
			            data:'',
			            dataType: "json",
			            success: function(data){
			                $('#modal-wrap').html(data.content);
			                $('#updateRequestsModal').modal({'backdrop':'static'});

			            }
			        });
			    });

			    $("#modal-wrap").on("click", "button#submit-update-requests-btn", function(e) {
						e.preventDefault();

			        var FormElement =  document.querySelector("#update-requests")
			        var submitFormData = new FormData(FormElement);
			        $('#confirm-box')
			      .modal({ backdrop: 'static', keyboard: false })
			      .one('click', '#confirm-button', function (e) {
							$('#submit-update-requests-btn').text('Submitting...');
							$('#submit-update-requests-btn').prop('disabled',true);
			          $.ajax({
			              url: '<?php echo admin_url('requests/editsubmit');?>',
			              type:'POST',
			              data:submitFormData,
			              contentType: false,
			              processData: false,
			              success: function(response){
			                var response = JSON.parse(response);
			                if(response.status=="1"){
			                    $('#updateRequestsModal').modal('hide');
			                   window.location.reload();
			                } else {
												$('#edit-form-wrap').html(response.data);
												$('#submit-update-requests-btn').text('Submit');
												$('#submit-update-requests-btn').prop('disabled',false);
			                }
			              }
			          });
			      });
			    });
    });

</script>
