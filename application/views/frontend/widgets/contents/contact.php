<section class="divider layer-overlay overlay-white-9" data-bg-img="images/bg/bg15.jpg">
<div class="container">
    <div class="row pt-30">
    <div class="col-md-6">
        <h3 class="line-bottom mt-0 mb-30">Interested in discussing?</h3>

        <!-- Contact Form -->
        <form id="contact_form" name="contact_form" class="" action="contact_form" method="post" novalidate="novalidate">
            <input type="hidden" name="_token" value="E6wKJ3XoRj1fUT597IzVbKWI2aM0IySP2Q2xgERn">            <div class="row">
            <div class="col-sm-6">
            <div class="form-group">
                <label>Name <small>*</small></label>
                <input name="form_name" class="form-control" type="text" placeholder="Enter Name" required="" aria-required="true">
            </div>
            </div>
            <div class="col-sm-6">
            <div class="form-group">
                <label>Email <small>*</small></label>
                <input name="form_email" class="form-control required email" type="email" placeholder="Enter Email" aria-required="true">
            </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
            <div class="form-group">
                <label>Subject <small>*</small></label>
                <input name="form_subject" class="form-control required" type="text" placeholder="Enter Subject" aria-required="true">
            </div>
            </div>
            <div class="col-sm-6">
            <div class="form-group">
                <label>Phone</label>
                <input name="form_phone" class="form-control" type="text" placeholder="Enter Phone">
            </div>
            </div>
        </div>

        <div class="form-group">
            <label>Message</label>
            <textarea name="form_message" class="form-control required" rows="5" placeholder="Enter Message" aria-required="true"></textarea>
        </div>
        <div class="g-recaptcha" data-sitekey="6LeFWxEbAAAAAO6srig3VEXTzIuLJXF6CkC7L1SC"></div>
        <div class="form-group">
            <input name="form_botcheck" class="form-control" type="hidden" value="">
            <button type="submit" class="btn btn-dark btn-theme-colored btn-flat mr-5" data-loading-text="Please wait...">Send your message</button>
            <button type="reset" class="btn btn-default btn-flat btn-theme-colored">Reset</button>
        </div>
        </form>

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
    <div class="col-md-6">
        <h3 class="line-bottom mt-0">Get in touch with us today!</h3>
        <p><?php echo $this->settings['CONTACT_GETINTOUCH']; ?></p>


        <div class="icon-box media mb-0 pb-0"> <a class="media-left pull-left flip mr-20" href="#"> <i class="pe-7s-map-2 text-theme-colored"></i></a>
        <div class="media-body">
            <h5 class="mt-0">Our Mailing Address</h5>
            <p><?php echo $this->settings['CONTACT_ADDRESS']; ?></p>
        </div>
        </div>
        <div class="icon-box media mb-0 pb-0 pt-0 mt-0"> <a class="media-left pull-left flip mr-15" href="#"> <i class="pe-7s-call text-theme-colored"></i></a>
        <div class="media-body">
            <h5 class="mt-0">Contact Number</h5>
            <p><a href="tel:+<?php echo preg_replace("/[^0-9]/", "", $this->settings['CONTACT_PHONE']); ?>"><?php echo $this->settings['CONTACT_PHONE']; ?></a></p>
        </div>
        </div>
        <div class="icon-box media mb-0 pb-0 pt-0 mt-0"> <a class="media-left pull-left flip mr-15" href="#"> <i class="pe-7s-mail text-theme-colored"></i></a>
        <div class="media-body">
            <h5 class="mt-0">Email Address</h5>
            <p><a href="mailto:<?php echo $this->settings['CONTACT_EMAIL']; ?>"><?php echo $this->settings['CONTACT_EMAIL']; ?></a></p>
        </div>
        </div>
    </div>
    </div>

</div>
</section>