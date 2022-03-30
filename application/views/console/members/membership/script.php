<script>

$(document).ready(function(){
		$(".right_col").on("click", "a#certificate-preview", function(e) {
          e.preventDefault();
					var certificateUrl = '<?php echo admin_url('members/certificatepreview/'.$membership->member_id);?>';
          $.ajax({
              url: certificateUrl,
              type:'GET',
              data:'',
              dataType: "json",
              success: function(data){
                  $('#modal-wrap').html(data.content);
                  $('#certificateModal').modal({'backdrop':'static'});

              }
          });
      });

			$(".right_col").on("click", "a#wallet-certificate-preview", function(e) {
						e.preventDefault();
						var certificateUrl = '<?php echo admin_url('members/walletcertificatepreview/'.$membership->member_id);?>';
						$.ajax({
								url: certificateUrl,
								type:'GET',
								data:'',
								dataType: "json",
								success: function(data){
										$('#modal-wrap').html(data.content);
										$('#walletCertificateModal').modal({'backdrop':'static'});

								}
						});
				});
	});

	
</script>
