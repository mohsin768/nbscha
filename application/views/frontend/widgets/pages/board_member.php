<section>
	     <div class="container">
	       <div class="section-content">
	       		         <div class="row">
	           <div class="col-md-4">
	             <div class="thumb">
	               <img src="public/images/bm_jan_d.jpg" alt="">
	             </div>
	           </div>
	           <div class="col-md-8">
	             <h4 class="name font-24 mt-0 mb-0">Jan Seely</h4>
	             <h5 class="mt-5">President</h5>
	             <p>Jan has been the President of the NB Special Care Home Association for many years.  She is a strong advocate for community based services.  Jan works hard to forge productive relationships with government, and other community partners, to strengthen the sector overall.

Her and her husband own and operate a small Special Care Home in Saint John.  The past 25 years in this occupation has given her a comprehensive knowledge base of the challenges faced by operators and their employees as they strive to deliver quality services to clients.</p>
	             <ul class="styled-icons icon-dark icon-theme-colored icon-sm mt-15 mb-0">
	              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
	              <li><a href="#"><i class="fa fa-skype"></i></a></li>
	              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
	            </ul>
	           </div>
	         </div>
	         <div class="row mt-30">
	           <div class="col-md-4">
	             <h4 class="line-bottom">About Me:</h4>
	             <div class="volunteer-address">
	               <ul>
	                 <li>
	                   <div class="bg-light media border-bottom p-15 mb-20">
	                     <div class="media-left">
	                       <i class="fa fa-wrench text-theme-colored font-24 mt-5"></i>
	                     </div>
	                     <div class="media-body">
	                       <h5 class="mt-0 mb-0">Location:</h5>
	                       <p>Bayswater, NB</p>
	                     </div>
	                   </div>
	                 </li>
	                 <!-- <li>
	                   <div class="bg-light media border-bottom p-15 mb-20">
	                     <div class="media-left">
	                       <i class="fa fa-map-marker text-theme-colored font-24 mt-5"></i>
	                     </div>
	                     <div class="media-body">
	                       <h5 class="mt-0 mb-0">Address:</h5>
	                       <p>Bayswater, NB</p>
	                     </div>
	                   </div>
	                 </li> -->
	                 <li>
	                   <div class="bg-light media border-bottom p-15">
	                     <div class="media-left">
	                       <i class="fa fa-phone text-theme-colored font-24 mt-5"></i>
	                     </div>
	                     <div class="media-body">
	                       <h5 class="mt-0 mb-0">Contact:</h5>
	                       <p><span>Phone:</span>(506) 639-4478<br><span>Email:</span> <a href="mailto:jan.seely@rogers.com">jan.seely@rogers.com</a></p>
	                     </div>
	                   </div>
	                 </li>
	               </ul>
	             </div>
	           </div>

	           <div class="col-md-8">
	             <div class="clearfix">
	               <h4 class="line-bottom">Quick Contact:</h4>
	             </div>
	             <form id="contact_form" class="contact-form-transparent" action="contact/board-member/2" method="post" novalidate="novalidate">
	             	<input type="hidden" name="_token" value="6YcrRmoRnGgy9oOLhtTMm1ZpmBJz3IzhYBiAgnz1">	               <div class="row">
	                 <div class="col-sm-12">
	                   <div class="form-group">
	                     <input type="text" placeholder="Enter Name" id="contact_name" name="contact_name" required="" class="form-control">
	                   </div>
	                 </div>
	                 <div class="col-sm-6">
	                   <div class="form-group">
	                     <input type="text" placeholder="Enter Email" id="contact_email" name="contact_email" class="form-control" required="">
	                   </div>
	                 </div>
	                 <div class="col-sm-6">
	                   <div class="form-group">
	                     <input type="text" placeholder="Enter Subject" id="contact_subject" name="contact_subject" class="form-control" required="">
	                   </div>
	                 </div>
	               </div>
	               <div class="form-group">
	                 <textarea rows="5" placeholder="Enter Message" id="contact_message" name="contact_message" required class="form-control"></textarea>
	               </div>
	               <div class="g-recaptcha" data-sitekey="6LeFWxEbAAAAAO6srig3VEXTzIuLJXF6CkC7L1SC"></div>
	               <div class="form-group">
	                 <button data-loading-text="Please wait..." class="btn btn-flat btn-dark btn-theme-colored mt-5" type="submit">Send your message</button>
	               </div>
	             </form>
	           </div>
	         </div>
	         		          	<!-- Contact Form Validation-->
	         		          	<script type="text/javascript">
	             		            $("#contact_form").validate({
	             		              submitHandler: function(form) {
	             		                var form_btn = $(form).find('button[type="submit"]');
	             		                var form_result_div = '#form-result';
	             		                $(form_result_div).remove();
	             		                form_btn.before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
	             		                var form_btn_old_msg = form_btn.html();
	             		                form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
	             		                $(form).ajaxSubmit({
	             		                  dataType:  'json',
	             		                  success: function(data) {
	             		                    if( data.status == 'true' ) {
	             		                      $(form).find('.form-control').val('');
	             		                    }
	             		                    form_btn.prop('disabled', false).html(form_btn_old_msg);
	             		                    $(form_result_div).html(data.message).fadeIn('slow');
	             		                    setTimeout(function(){ $(form_result_div).fadeOut('slow') }, 6000);
	             		                  }
	             		                });
	             		              }
	             		            });
	         		           </script>
	       	       </div>
	     </div>
	   </section>