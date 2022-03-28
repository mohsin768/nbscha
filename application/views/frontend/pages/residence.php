<section>
<div class="container mt-30 mb-0 pt-30 pb-30">
    <div class="row">
    <div class="col-md-8 blog-pull-right">
        <div class="single-service">
        <!-- Slide Start--->
            <div id="propertiesDetailsSlider" class="carousel properties-details-sliders slide mb-40">
                <div class="carousel-inner">
                    <?php $i=0; foreach($images as $image):  ?>
                    <div class="item carousel-item active" data-slide-number="<?php echo $i; ?>">
                        <img src="<?php echo $image; ?>" width="100%">
                    </div>
                    <?php $i++; endforeach; ?>
                    <a class="carousel-control left" href="#propertiesDetailsSlider" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                    <a class="carousel-control right" href="#propertiesDetailsSlider" data-slide="next"><i class="fa fa-angle-right"></i></a>
                </div>

            </div>
        <!--End Slider-->
        <h3 class="text-theme-colored"><?php echo $residence->name; ?></h3>
        <h5><em><span class="text-theme-color-2"><i class="fa fa-map-marker"></i></span><?php echo $residence->address; ?></em></h5>

        <div class="properties-description mb-40">
            <h3 class="heading-2 text-theme-colored">Description</h3>
            <?php echo $residence->description; ?>
        </div>
        <div class="properties-summary mb-40">
            <h3 class="heading-2 text-theme-colored">Details</h3>
            <ul>
                <?php if($residence->contact_name!=''){ ?>
                <li><b>Contact Name</b><br><?php echo $residence->contact_name; ?></li>
                <?php } if($residence->email!=''){ ?>
                <li><b>Email</b><br><?php echo $residence->email; ?></li>
                <?php } if($residence->phone!=''){ ?>
                <li><b>Phone</b><br><?php echo $residence->phone; ?></li>
                <?php } if($residence->fax!=''){ ?>
                <li><b>Fax</b><br><?php echo $residence->fax; ?></li>
                <?php } if($residence->region_id!='' && isset($regions[$residence->region_id])){ ?>
                <li><b>Region</b><br><?php echo $regions[$residence->region_id]; ?></li>
                <?php } if($residence->postalcode!=''){ ?>
                <li><b>Postal Code</b><br><?php echo $residence->pharmacy_name; ?></li>
                <?php } if($residence->level_id!='' && isset($levels[$residence->level_id])){ ?>
                <li><b>Level of Care</b><br><?php echo $levels[$residence->level_id]; ?></li>
                <?php } if($residence->package_id!='' && isset($packages[$residence->package_id])){ ?>
                <li><b>Bed</b><br><?php echo $packages[$residence->package_id]; ?></li>
                <?php } if($residence->pharmacy_name!=''){ ?>
                <li><b>Pharmacy</b><br><?php echo $residence->pharmacy_name; ?></li>
                <?php } ?>

            </ul>
            <ul>
                <li style="width: 100%"><b>Facility</b><br><?php echo $facilities; ?></li>
            </ul>
        </div>

        <div class="row">
            <div class="properties-summary ft-sr mb-40">
            <h3 class="heading-2 text-theme-colored">Features of Services </h3>
            <div class="row chk-b">
                <?php foreach($features as $id => $feature): ?>
                <div class="col-md-6" style="margin: 5px 0 5px 0px;"><?php if(isset($residenceFeatures[$id]) && $residenceFeatures[$id]=='1'){ ?> (<b class="cheked-mark">&#10004;</b>)<?php } else { ?> <b style="text-transform: none;">(x)</b><?php } ?><?php echo $feature ?></b></div>
                <?php endforeach; ?>
            </div>
            <br>
            </div>
        </div>

        </div>
    </div>
    <div class="col-sm-12 col-md-4 maincl">
        <div class="sidebar sidebar-left mt-sm-30 ml-40">

        <div class="widget">
            <h4 class="widget-title line-bottom">Capacity</h4>
            <div class="services-list">
            <ul class="list list-border angle-double-right">
                <p class="vc-pc"><b>Licensed Beds: <?php echo $residence->beds_count; ?></b></p>
                <p class="vc-pc"><b>Current Vacancy: <?php echo $residence->vacancy; ?></b></p>
            </ul>
            </div>
        </div>
        <div class="widget">
            <div class="contact-div">
                    <h4 class="widget-title line-bottom">Ask a question?</h4>

                        <!-- Contact Form -->
                <form id="residence_form" name="contact_form" class="" action="<?php echo site_url('ajax/forms/enquiries');?>" method="post" novalidate="novalidate">
                    <input type="hidden" name="form_type" value="residence" />     
                    <input type="hidden" name="form_member_id" value="<?php echo $residence->member_id; ?>" />     
                    <input type="hidden" name="form_home_id" value="<?php echo $residence->id; ?>" />     
                    <input type="hidden" name="form_token" id="form_token" value="" />  
                    <input type="hidden" name="form_action" id="form_action" value="" />  
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Name <small>*</small></label>
                                <input name="form_name" class="form-control" type="text" placeholder="Enter Name" required="" aria-required="true">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Email <small>*</small></label>
                                <input name="form_email" class="form-control required email" type="email" placeholder="Enter Email" aria-required="true">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                        <div class="form-group">
                            <label>Subject <small>*</small></label>
                            <input name="form_subject" class="form-control required" type="text" placeholder="Enter Subject" aria-required="true">
                        </div>
                        </div>
                        <div class="col-sm-12">
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
                    <div class="form-group">
                        <button type="submit" class="btn btn-dark btn-theme-colored btn-flat mr-5" data-loading-text="Please wait...">Send your message</button>
                        <button type="reset" class="btn btn-default btn-flat btn-theme-colored">Reset</button>
                    </div>
                </form>

                <!-- Contact Form Validation-->
                <script type="text/javascript">
                    $("#residence_form").validate({
                        submitHandler: function(form) {
                            var form_btn = $(form).find('button[type="submit"]');
                            var form_result_div = '#form-result';
                            $(form_result_div).remove();
                            form_btn.before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
                            var form_btn_old_msg = form_btn.html();
                            form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
                            grecaptcha.ready(function() {
                                grecaptcha.execute(captchaSiteKey, {action: 'residence_form'}).then(function(token) {
                                    $('#form_token').val(token);
                                    $('#form_action').val('residence_form');
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
            <div class="widget">
            <div class="social-cl">
                <h3 class="widget-title line-bottom">Social Network</h3>
                <div class="row">
                <div class="col-md-12">
                    <ul class="styled-icons icon-dark icon-theme-colored mt-20"> 
                        <?php if($residence->facebook!=''){ ?>
                        <li><a href="<?php echo $residence->facebook; ?>"><i class="fa fa-facebook"></i></a></li>	
                        <?php } if($residence->instagram!=''){ ?>		  	 
                        <li><a href="<?php echo $residence->instagram; ?>"><i class="fa fa-instagram"></i></a></li>
                        <?php } if($residence->youtube!=''){ ?>	
                        <li><a href="<?php echo $residence->youtube; ?>"><i class="fa fa-youtube"></i></a></li>
                        <?php } if($residence->twitter!=''){ ?>		  	 
                        <li><a href="<?php echo $residence->twitter; ?>"><i class="fa fa-twitter"></i></a></li>
                        <?php } if($residence->linkedin!=''){ ?>	
                        <li><a href="<?php echo $residence->linkedin; ?>"><i class="fa fa-linkedin"></i></a></li>
                        <?php } ?>
				    </ul>
                </div>
                </div>
            </div>

        </div>

    </div>
    </div>
</div>
</section>