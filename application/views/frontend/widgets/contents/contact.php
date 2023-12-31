<section class="divider layer-overlay overlay-white-9">
<div class="container">
    <div class="row pt-30">
    <div class="col-md-6">
        <h3 class="line-bottom mt-0 mb-30"><?php echo translate('INTERESTED_DISCUSS','Interested in discussing?');?></h3>

        <!-- Contact Form -->
        <form id="contact_form" name="contact_form" class="" action="<?php echo site_url('ajax/forms/enquiries');?>" method="post" novalidate="novalidate">
        <input type="hidden" name="form_type" value="contact" />
        <input type="hidden" name="form_token" id="form_token" value="" />
        <input type="hidden" name="form_action" id="form_action" value="" />
        <div class="row">
            <div class="col-sm-6">
            <div class="form-group">
                <label><?php echo translate('ENTER_NAME','Name');?> <small>*</small></label>
                <input name="form_name" class="form-control" type="text" placeholder="<?php echo translate('ENTER_NAME','Enter Name');?>" required="" aria-required="true">
            </div>
            </div>
            <div class="col-sm-6">
            <div class="form-group">
                <label><?php echo translate('EMAIL','Email');?> <small>*</small></label>
                <input name="form_email" class="form-control required email" type="email" placeholder="<?php echo translate('ENTER_EMAIL','Enter Email');?>" aria-required="true">
            </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
            <div class="form-group">
                <label><?php echo translate('ENTER_SUBJECT','Subject');?> <small>*</small></label>
                <input name="form_subject" class="form-control required" type="text" placeholder="<?php echo translate('ENTER_SUBJECT','Enter Subject');?>" aria-required="true">
            </div>
            </div>
            <div class="col-sm-6">
            <div class="form-group">
                <label><?php echo translate('PHONE','Phone');?></label>
                <input name="form_phone" class="form-control" type="text" placeholder="<?php echo translate('ENTER_PHONE','Enter Phone');?>">
            </div>
            </div>
        </div>

        <div class="form-group">
            <label><?php echo translate('ENTER_MESSAGE','Message');?></label>
            <textarea name="form_message" class="form-control required" rows="5" placeholder="<?php echo translate('ENTER_MESSAGE','Enter Message');?>" aria-required="true"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-dark btn-theme-colored btn-flat mr-5" data-loading-text="<?php echo translate('PLEASE_WAIT','Please wait...');?>"><?php echo translate('SEND_MESSAGE','Send your message');?></button>
            <button type="reset" class="btn btn-default btn-flat btn-theme-colored"><?php echo translate('RESET','Reset');?></button>
        </div>
        </form>

        <!-- Contact Form Validation-->
        <script type="text/javascript">
        $("#contact_form").validate({
            submitHandler: function(form) {
                var form_btn = $(form).find('button[type="submit"]');
                var form_result_div = '#form-result';
                $(form_result_div).remove();
                form_btn.before('<div id="form-result" class="alert" style="display: none;"></div>');
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
                            form_btn.prop('disabled', false).html(form_btn_old_msg);
                            var resultClass = 'alert-danger';
                            if(data.status=='1'){ resultClass = 'alert-success'; }
                            $(form_result_div).addClass(resultClass);
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
    <div class="col-md-6">
        <h3 class="line-bottom mt-0"><?php echo translate('GET_IN_TOUCH_US','Get in touch with us today!');?></h3>
        <p><?php echo $this->settings['CONTACT_GETINTOUCH']; ?></p>


        <div class="icon-box media mb-0 pb-0"> <a class="media-left pull-left flip mr-20" href="#"> <i class="pe-7s-map-2 text-theme-colored"></i></a>
        <div class="media-body">
            <h5 class="mt-0"><?php echo translate('OUR_MAILING_LIST','Our Mailing Address');?></h5>
            <p><?php echo $this->settings['CONTACT_ADDRESS']; ?></p>
        </div>
        </div>
        <div class="icon-box media mb-0 pb-0 pt-0 mt-0"> <a class="media-left pull-left flip mr-15" href="#"> <i class="pe-7s-call text-theme-colored"></i></a>
        <div class="media-body">
            <h5 class="mt-0"><?php echo translate('CONTACT_PHONE','Contact Number');?></h5>
            <p><a href="tel:+<?php echo preg_replace("/[^0-9]/", "", $this->settings['CONTACT_PHONE']); ?>"><?php echo $this->settings['CONTACT_PHONE']; ?></a></p>
        </div>
        </div>
        <div class="icon-box media mb-0 pb-0 pt-0 mt-0"> <a class="media-left pull-left flip mr-15" href="#"> <i class="pe-7s-mail text-theme-colored"></i></a>
        <div class="media-body">
            <h5 class="mt-0"><?php echo translate('EMAIL_ADDRESS','Email Address');?></h5>
            <p><a href="mailto:<?php echo $this->settings['CONTACT_EMAIL']; ?>"><?php echo $this->settings['CONTACT_EMAIL']; ?></a></p>
        </div>
        </div>
    </div>
    </div>

</div>
</section>
