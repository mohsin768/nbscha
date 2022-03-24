<script>

$(document).ready(function(){
		$(".right_col").on("click", "a#certificate-preview", function(e) {
          e.preventDefault();
					var certificateUrl = '<?php echo member_url('membership/certificatepreview');?>';
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
						var certificateUrl = '<?php echo member_url('membership/walletcertificatepreview');?>';
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
