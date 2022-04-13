<section>
	     <div class="container">
	       <div class="section-content">
	       		         <div class="row">
	           <div class="col-md-4">
			  	 <?php if($boardMember->photo!=''){ $boardMemberImage = frontend_uploads_url('teams/'.$boardMember->photo); ?>  
	             <div class="thumb">
	               <img src="<?php echo $boardMemberImage; ?>" alt=<?php echo $boardMember->name; ?>">
	             </div>
				 <?php } ?>
	           </div>
	           <div class="col-md-8">
	             <h4 class="name font-24 mt-0 mb-0"><?php echo $boardMember->name; ?></h4>
	             <h5 class="mt-5"><?php echo $boardMember->position; ?></h5>
	             <?php echo $boardMember->bio; ?>
	             <ul class="styled-icons icon-dark icon-theme-colored icon-sm mt-15 mb-0">
				  <?php if($boardMember->facebook!=''){ ?>	 
	              <li><a href="<?php echo $boardMember->facebook; ?>"><i class="fa fa-facebook"></i></a></li>
				  <?php } ?>
				  <?php if($boardMember->skype!=''){ ?>	 
	              <li><a href="<?php echo $boardMember->skype; ?>"><i class="fa fa-skype"></i></a></li>
				  <?php } ?>
				  <?php if($boardMember->twitter!=''){ ?>	 
	              <li><a href="<?php echo $boardMember->twitter; ?>"><i class="fa fa-twitter"></i></a></li>
				  <?php } ?>
	            </ul>
	           </div>
	         </div>
	         <div class="row mt-30">
	           <div class="col-md-4">
	             <h4 class="line-bottom"><?php echo translate('ABOUT_ME','About Me');?>:</h4>
	             <div class="volunteer-address">
	               <ul>
				   <?php if($boardMember->location!=''){ ?>	 
	                 <li>
	                   <div class="bg-light media border-bottom p-15 mb-20">
	                     <div class="media-left">
	                       <i class="fa fa-wrench text-theme-colored font-24 mt-5"></i>
	                     </div>
	                     <div class="media-body">
	                       <h5 class="mt-0 mb-0"><?php echo translate('LOCATION','Location');?>:</h5>
	                       <p><?php echo $boardMember->location; ?></p>
	                     </div>
	                   </div>
	                 </li>
					 <?php } ?>
	                 <li>
	                   <div class="bg-light media border-bottom p-15">
	                     <div class="media-left">
	                       <i class="fa fa-phone text-theme-colored font-24 mt-5"></i>
	                     </div>
	                     <div class="media-body">
	                       <h5 class="mt-0 mb-0"><?php echo translate('CONTACT','Contact');?>:</h5>
	                       <p>
						   	<?php if($boardMember->phone!=''){ ?>	   
							<span><?php echo translate('PHONE','Phone');?>:</span><?php echo $boardMember->phone; ?><br> 
							<?php } ?>
							<?php if($boardMember->email!=''){ ?>	 
							<span><?php echo translate('EMAIL','Email');?>:</span>
						    <a href="mailto:<?php echo $boardMember->email; ?>"><?php echo $boardMember->email; ?></a>
							<?php } ?>
							</p>
	                     </div>
	                   </div>
	                 </li>
	               </ul>
	             </div>
	           </div>

	           <div class="col-md-8">
	             <div class="clearfix">
	               <h4 class="line-bottom"><?php echo translate('QUICK_CONTACT','Quick Contact');?>:</h4>
	             </div>
	             <form id="board_form" class="contact-form-transparent" action="<?php echo site_url('ajax/forms/enquiries');?>" method="post" novalidate="novalidate">
					<input type="hidden" name="form_type" value="board_member" />     
					<input type="hidden" name="form_board_member_id" value="<?php echo $boardMember->id; ?>" />    
					<input type="hidden" name="form_token" id="form_token" value="" />  
					<input type="hidden" name="form_action" id="form_action" value="" />  
	             	<div class="row">
	                 <div class="col-sm-12">
	                   <div class="form-group">
	                     <input type="text" placeholder="<?php echo translate('ENTER_NAME','Enter Name');?>" id="form_name" name="form_name" required="" class="form-control">
	                   </div>
	                 </div>
	                 <div class="col-sm-6">
	                   <div class="form-group">
	                     <input type="text" placeholder="<?php echo translate('ENTER_EMAIL','Enter Email');?>" id="form_email" name="form_email" class="form-control" required="">
	                   </div>
	                 </div>
	                 <div class="col-sm-6">
	                   <div class="form-group">
	                     <input type="text" placeholder="<?php echo translate('ENTER_SUBJECT','Enter Subject');?>" id="form_subject" name="form_subject" class="form-control" required="">
	                   </div>
	                 </div>
	               </div>
	               <div class="form-group">
	                 <textarea rows="5" placeholder="<?php echo translate('ENTER_MESSAGE','Enter Message');?>" id="form_message" name="form_message" required class="form-control"></textarea>
	               </div>
	               <div class="g-recaptcha" data-sitekey="6LeFWxEbAAAAAO6srig3VEXTzIuLJXF6CkC7L1SC"></div>
	               <div class="form-group">
	                 <button data-loading-text="<?php echo translate('PLEASE_WAIT','Please wait...');?>" class="btn btn-flat btn-dark btn-theme-colored mt-5" type="submit"><?php echo translate('SEND_YOUR_MESSAGE','Send your message');?></button>
	               </div>
	             </form>
	           </div>
	         </div>
	         		          	<!-- Contact Form Validation-->
	         		          	<script type="text/javascript">
	             		            $("#board_form").validate({
	             		              submitHandler: function(form) {
	             		                var form_btn = $(form).find('button[type="submit"]');
	             		                var form_result_div = '#form-result';
	             		                $(form_result_div).remove();
	             		                form_btn.before('<div id="form-result" class="alert" role="alert" style="display: none;"></div>');
	             		                var form_btn_old_msg = form_btn.html();
	             		                form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
										grecaptcha.ready(function() {
											grecaptcha.execute(captchaSiteKey, {action: 'contact_form'}).then(function(token) {
												$('#form_token').val(token);
												$('#form_action').val('contact_form');
												$(form).ajaxSubmit({
													dataType:  'json',
													success: function(data) {
														if( data.status == '1' ) {
														$(form).find('.form-control').val('');
														}
														var resultClass = 'alert-danger';
														if(data.status=='1'){ resultClass = 'alert-success'; }
														$(form_result_div).addClass(resultClass);
														form_btn.prop('disabled', false).html(form_btn_old_msg);
														$(form_result_div).html(data.message).fadeIn('slow');
														setTimeout(function(){ $(form_result_div).fadeOut('slow') }, 6000);
													}
												});
											});;
                						});	
	             		              }
	             		            });
	         		           </script>
	       	       </div>
	     </div>
	   </section>