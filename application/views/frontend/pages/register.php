<section class="section">
<div class="container pb-70">
    <div class="row m-0">
        <div class="pl-md-5 mainRow">
            <div role="main" class="main">
                <div class="overflow-hidden">
                <?php if($this->session->flashdata('message')){ ?>
                    <div class="alert <?php echo $this->session->flashdata('message')['status']; ?>">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <?php echo $this->session->flashdata('message')['message']; ?>
                    </div>
                <?php } ?>
                </div>
                <br>
                <div class="overflow-hidden mb-2" style="text-align: center;">
                    <h1 class="font-weight-bold text-6 mb-0 appear-animation animated maskUp appear-animation-visible" data-appear-animation="maskUp" data-appear-animation-delay="800" style="animation-delay: 800ms;"><?php echo translate('POST_HOME_MESSAGE','Post Your Special Care Home with NBSCHA <span style="color:#CD291D;font-family: PermanentMarker;"><b style="font-weight: 800;">Today!</b></span>');?> </h1>
                </div>
                <div class="overflow-hidden mb-1" style="text-align: center;">
                  <?php echo translate('POST_HOME_BODY','<p class="text-2 mb-0 appear-animation animated maskUp appear-animation-visible" data-appear-animation="maskUp" data-appear-animation-delay="1000" style="animation-delay: 1000ms; font-size: 17px!important; color: #000;"> Would you like to be added to the New Brunswick Special Care Home Directory?</p><br>
                  <p style="margin-bottom: 0px; font-size: 17px; color: #000;">
                      *<b>Please fill out the fields below, especially all fields that have a (*) as these are mandatory fields and you will not be fully registered without these mandatory items.</b></p>
                  <p style="font-size: 17px; color: #000;">Once you have clicked the <b style="font-weight: 800; color: red">“SUBMIT”</b> button we will send you a confirmation email as soon as payment has been received and your facility was officially added to our website.
                  </p>');?>

                </div>

                <div class="card bg-primary border-0 rounded mb-5 appear-animation animated fadeInUpShorter appear-animation-visible" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1200" style="animation-delay: 1200ms;padding-bottom:30px;">
                    <div class="card-body p-30">
                        <div class="icon-box icon-box-style-1 align-items-center mb-0">
                            <div class="icon-box-info">
                                <div class="icon-box-info-title">
                                    <span class="icon-box-sub-title text-color-light"><?php echo translate('FILL FORM','FILL IN FORM BELOW');?></span>
                                    <h4 class="text-color-light font-weight-bold line-height-1 mb-0" style="font-size: 16px;"><?php echo translate('FILL_FORM_TAGLINE','BE PART OF OUR ONLINE COMMUNITY!');?></h4>

                                </div>
                            </div>
                        </div>
                        <p class="text-color-light opacity-6 mb-3"></p>
                            <?php
                            $attributes = array('class' => '', 'id' => 'nbscha-register-form');
                            echo form_open_multipart('register',$attributes);
                            ?>
                            <div class="form-row">
                                <div class="form-group col-lg-4 ">
                                    <input type="text" class="form-control rounded-0 border-0 line-height-1" placeholder="<?php echo translate('FIRST_NAME','First Name');?>*" name="first_name" id="first_name" aria-label="First Name" required="" value="<?php echo set_value('first_name'); ?>">
                                    <div class="error"><?php echo form_error('first_name'); ?></div>
                                </div>
                                <div class="form-group col-lg-4 ">
                                    <input type="text" class="form-control rounded-0 border-0 line-height-1" placeholder="<?php echo translate('LAST_NAME','Last Name');?>*" name="last_name" id="last_name" aria-label="Last Name" required="" value="<?php echo set_value('last_name'); ?>">
                                    <div class="error"><?php echo form_error('last_name'); ?></div>
                                </div>
                                <div class="form-group col-lg-4 ">
                                    <input type="email" class="form-control rounded-0 border-0 line-height-1" placeholder="<?php echo translate('EMAIL_ADDRESS','Email');?>*" name="email" id="email" required="" value="<?php echo set_value('email'); ?>">
                                    <div class="error"><?php echo form_error('email'); ?></div>
                                </div>
                                <div class="form-group col-lg-4 ">
                                    <input type="text" class="form-control rounded-0 border-0 line-height-1" placeholder="<?php echo translate('PHONE_NUMBER','Phone Number');?>*" name="phone" id="phone" aria-label="Phone Number" required="" value="<?php echo set_value('phone'); ?>">
                                    <div class="error"><?php echo form_error('phone'); ?></div>
                                </div>

                                <div class="form-group col-lg-4 ">
                                    <input type="password" class="form-control rounded-0 border-0 line-height-1" placeholder="<?php echo translate('PASSWORD','Password');?>*" name="password" id="password" aria-label="Password" required="" value="<?php echo set_value('password'); ?>">
                                    <div class="error"><?php echo form_error('password'); ?></div>
                                </div>
                                <div class="form-group col-lg-4 ">
                                    <input type="password" class="form-control rounded-0 border-0 line-height-1" placeholder="<?php echo translate('CONFIRM_PASSWORD','Confirm Password');?>" name="confirm_password" id="confirm_password" aria-label="Confirm Password" required="" value="<?php echo set_value('confirm_password'); ?>">
                                    <div class="error"><?php echo form_error('confirm_password'); ?></div>
                                </div>
                                <div id="sc_427" class="row ap-cls">
                                    <div class="form-group col-lg-12">
                                        <div class="icon-box-info">
                                            <div class="icon-box-info-title">
                                                <span class="icon-box-sub-title text-color-light"><?php echo translate('FILL_FORM','FILL IN FORM BELOW');?></span>
                                                <h4 class="text-color-light font-weight-bold line-height-1 mb-0" style="font-size: 16px;"><?php echo translate('ADD_CARE_HOME','Add Special Care Home Details!');?></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="spchclass form-group col-lg-4 ">
                                        <input type="text" class="form-control rounded-0 border-0 line-height-1" placeholder="<?php echo translate('HOME_NAME','Special Care Home Name');?>*" name="home_name" id="home_name" required="" onchange="" value="<?php echo set_value('home_name'); ?>">
                                        <div class="error"><?php echo form_error('home_name'); ?></div>
                                    </div>
                                    <div class="spchclass form-group col-lg-4 ">
                                        <input type="text" class="form-control rounded-0 border-0 line-height-1" placeholder="<?php echo translate('HOME_ADDRESS','Special Care Home Address');?>*" name="home_address" id="home_address" required="" onchange="" value="<?php echo set_value('home_address'); ?>">
                                        <div class="error"><?php echo form_error('home_address'); ?></div>
                                    </div>
                                    <div class="spchclass form-group col-lg-4 ">
                                        <input type="text" class="form-control rounded-0 border-0 line-height-1" placeholder="<?php echo translate('HOME_POST','Special Care Home Postal Code');?>*" name="home_postalcode" id="home_postalcode" required="" onchange="" value="<?php echo set_value('home_postalcode'); ?>">
                                        <div class="error"><?php echo form_error('home_postalcode'); ?></div>
                                    </div>
                                    <div class="spchclass form-group col-lg-4 ">
                                        <input type="text" class="form-control rounded-0 border-0 line-height-1" placeholder="<?php echo translate('HOME_CONTACT_PERSON','Special Care Home Contact Person');?>*" name="home_contact_name" id="home_contact_name" required="" onchange="" value="<?php echo set_value('home_contact_name'); ?>">
                                        <div class="error"><?php echo form_error('home_contact_name'); ?></div>
                                    </div>
                                    <div class="spchclass form-group col-lg-4 ">
                                        <input type="email" class="form-control rounded-0 border-0 line-height-1" placeholder="<?php echo translate('HOME_CONTACT_EMAIL','Special Care Home Email');?>*" name="home_email" id="home_email" required="" onchange="" value="<?php echo set_value('home_email'); ?>">
                                        <div class="error"><?php echo form_error('home_email'); ?></div>
                                    </div>
                                    <div class="spchclass form-group col-lg-4 ">
                                        <input type="text" class="form-control rounded-0 border-0 line-height-1" placeholder="<?php echo translate('HOME_CONTACT_PHONE','Special Care Home Phone');?>*" name="home_phone" id="home_phone" required="" onchange="" value="<?php echo set_value('home_phone'); ?>">
                                        <div class="error"><?php echo form_error('home_phone'); ?></div>
                                    </div>
                                    <div class="spchclass form-group col-lg-4 ">
                                        <input type="text" class="form-control rounded-0 border-0 line-height-1" placeholder="<?php echo translate('HOME_CONTACT_FAX','Special Care Home Fax');?>" name="home_fax" id="home_fax" onchange="" value="<?php echo set_value('home_fax'); ?>">
                                        <div class="error"><?php echo form_error('home_fax'); ?></div>
                                    </div>
                                <div class="spchclass form-group col-lg-4 ">
                                    <select class="form-control rounded-0 border-0 line-height-1" name="package_id" id="package_id" required="">
                                      <option value="">--<?php echo translate('HOME_SELECT_BED','Select Number of Beds');?>*--</option>
                                      <?php foreach($packages as $package): ?>
                                      <option value="<?php echo $package['pid']; ?>" <?php echo set_select('package_id',$package['pid']); ?> data-package-price="<?php echo $package['price']; ?>" data-package-currency="$"><?php echo $package['title']; ?></option>
                                      <?php endforeach; ?>
                                    </select>
                                    <div class="error"><?php echo form_error('package_id'); ?></div>
                                  </div>
                                  <div class="spchclass form-group col-lg-4 ">
                                    <input type="text" class="form-control rounded-0 border-0 line-height-1" placeholder="<?php echo translate('HOME_MAXIMUM_BED','Maximum Licensed Beds');?>" name="max_beds_count" id="max_beds_count" onchange="" value="<?php echo set_value('max_beds_count'); ?>">
                                    <div class="error"><?php echo form_error('max_beds_count'); ?></div>
                                  </div>
                                  <div class="spchclass form-group col-lg-4 ">
                                    <select class="form-control rounded-0 border-0 line-height-1" name="home_level" id="home_level" required="">
                                      <option value="">--<?php echo translate('HOME_SELECT_CARELEVEL','Select Level of Care');?>*--</option>
                                      <?php foreach($levels as $level): ?>
                                      <option value="<?php echo $level['cid']; ?>" <?php echo set_select('home_level',$level['cid']); ?>><?php echo $level['carelevel_title']; ?></option>
                                      <?php endforeach; ?>
                                    </select>
                                    <div class="error"><?php echo form_error('home_level'); ?></div>
                                  </div>
                                  <div class="spchclass form-group col-lg-4 ">
                                    <select class="form-control rounded-0 border-0 line-height-1" name="home_language" id="home_language" required="">
                                      <option value="">--<?php echo translate('HOME_SELECT_LANGUAGE','Select Language(s)');?>*--</option>
                                      <?php foreach($homeLanguages as $id => $name ): ?>
                                      <option value="<?php echo $id; ?>" <?php echo set_select('home_language',$id); ?>><?php echo $name; ?></option>
                                      <?php endforeach; ?>
                                    </select>
                                    <div class="error"><?php echo form_error('home_language'); ?></div>
                                  </div>

                                <div class="spchclass form-group col-lg-4 rounded-0 border-0 line-height-1">
                                    <div class="selectBox">
                                        <select class="form-control" id="facilities" name="facilities[]" multiple>
                                            <?php foreach($facilities as $facility): ?>
                                            <option value="<?php echo $facility['fid']; ?>" <?php echo set_select('facilities[]',$facility['fid']); ?>><?php echo $facility['facility_title']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="error"><?php echo form_error('facilities[]'); ?></div>
                                </div>

                                <div class="spchclass form-group col-lg-12 ">
                                  <select class="form-control rounded-0 border-0 line-height-1" name="region_id" id="region_id" required="">
                                    <option value="">--<?php echo translate('HOME_SELECT_REGION','Select Region');?>*--</option>
                                    <?php foreach($regions as $region): ?>
                                      <option value="<?php echo $region['rid']; ?>" <?php echo set_select('region_id',$region['rid']); ?>><?php echo $region['region_name']; ?></option>
                                      <?php endforeach; ?>
                                  </select>
                                  <div class="error"><?php echo form_error('region_id'); ?></div>
                                </div>
                                <div class="spchclass form-group col-lg-12 ">
                                    <input type="text" class="form-control rounded-0 border-0 line-height-1" placeholder="<?php echo translate('HOME_PHARMACY','Special Care Home Pharmacy Name');?>*" name="pharmacy_name" id="pharmacy_name" required="" onchange="" value="<?php echo set_value('pharmacy_name'); ?>">
                                    <div class="error"><?php echo form_error('pharmacy_name'); ?></div>
                                  </div>
                                <div class="spchclass form-group col-lg-12 ">
                                    <textarea class="form-control rounded-0 border-0 line-height-1" placeholder="<?php echo translate('HOME_DESCRIPTION','Description of Home and Services to the Public');?>" name="description" id="description" style="height: 150px!important;" required=""><?php echo set_value('description'); ?></textarea>
                                    <div class="error"><?php echo form_error('description'); ?></div>
                                </div>

                                <div class="spchclass form-group col-lg-12 ">
                                    <textarea class="form-control rounded-0 border-0 line-height-1" placeholder="<?php echo translate('NOTES_ADMIN','Notes/Comments for Admin');?>" name="comments" id="comments"><?php echo set_value('comments'); ?></textarea>
                                    <div class="error"><?php echo form_error('comments'); ?></div>
                                </div>


                                <div class="spchclass form-group col-lg-4 ">
                                    <label class="label-control"><?php echo translate('UPLOAD_IMAGE','Upload Main Image');?></label>*
                                    <input type="file" class="form-control rounded-0 border-0 line-height-1" name="mainimage" id="mainimage" required="">
                                    <div class="error"><?php echo form_error('mainimage'); ?></div>
                                </div>
                                <div class="spchclass form-group col-lg-4 ">
                                    <label class="label-control"><?php echo translate('UPLOAD_IMAGE2','Upload 2nd Image');?></label>
                                    <input type="file" class="form-control rounded-0 border-0 line-height-1" name="image2" id="image2">
                                </div>
                                <div class="spchclass form-group col-lg-4 ">
                                    <label class="label-control"><?php echo translate('UPLOAD_IMAGE3','Upload 3rd Image');?></label>
                                    <input type="file" class="form-control rounded-0 border-0 line-height-1" name="image3" id="image3" ></div>
                                <div class="spchclass form-group col-lg-4 ">
                                    <label class="label-control"><?php echo translate('UPLOAD_IMAGE4','Upload 4th Image');?></label>
                                    <input type="file" class="form-control rounded-0 border-0 line-height-1" name="image4" id="image4" ></div>
                                <div class="spchclass form-group col-lg-4 ">
                                    <label class="label-control"><?php echo translate('UPLOAD_IMAGE5','Upload 5th Image');?>  </label>
                                    <input type="file" class="form-control rounded-0 border-0 line-height-1"  name="image5" id="image5" ></div>
                                <div class="spchclass form-group col-lg-4 ">
                                    <label class="label-control"><?php echo translate('UPLOAD_IMAGE6','Upload 6th Image');?>  </label>
                                    <input type="file" class="form-control rounded-0 border-0 line-height-1"  name="image6" id="image6"></div>
                                <div class="spchclass form-group col-lg-12 ">
                                    <input type="text" class="form-control rounded-0 border-0 line-height-1" placeholder="<?php echo translate('VIRTUAL_TOUR','Virtual Tour (Youtube Link)');?>" name="virtual_tour" id="virtual_tour" onchange="" value="<?php echo set_value('virtual_tour'); ?>">
                                    <div class="error"><?php echo form_error('virtual_tour'); ?></div>
                                </div>
                                <div class="spchclass form-group col-lg-4 ">
                                    <input type="text" class="form-control rounded-0 border-0 line-height-1" placeholder="<?php echo translate('FB_LINK','Facebook link');?>" name="facebook" id="facebook" onchange="" value="<?php echo set_value('facebook'); ?>">
                                    <div class="error"><?php echo form_error('facebook'); ?></div>
                                </div>
                                <div class="spchclass form-group col-lg-4 ">
                                    <input type="text" class="form-control rounded-0 border-0 line-height-1" placeholder="<?php echo translate('INSTA_LINK','Instagram link');?>" name="instagram" id="instagram" onchange="" value="<?php echo set_value('instagram'); ?>">
                                    <div class="error"><?php echo form_error('instagram'); ?></div>
                                </div>
                                <div class="spchclass form-group col-lg-4 ">
                                    <input type="text" class="form-control rounded-0 border-0 line-height-1" placeholder="<?php echo translate('TW_LINK','Twitter link');?>" name="twitter" id="twitter" onchange="" value="<?php echo set_value('twitter'); ?>">
                                    <div class="error"><?php echo form_error('twitter'); ?></div>
                                </div>
                                <div class="spchclass form-group col-lg-4 ">
                                    <input type="text" class="form-control rounded-0 border-0 line-height-1" placeholder="<?php echo translate('YT_LINK','YouTube link');?>" name="youtube" id="youtube" onchange="" value="<?php echo set_value('youtube'); ?>">
                                    <div class="error"><?php echo form_error('youtube'); ?></div>
                                </div>
                                <div class="spchclass form-group col-lg-4 ">
                                    <input type="text" class="form-control rounded-0 border-0 line-height-1" placeholder="<?php echo translate('LI_LINK','LinkedIn link');?>" name="linkedin" id="linkedin" onchange="" value="<?php echo set_value('linkedin'); ?>">
                                    <div class="error"><?php echo form_error('linkedin'); ?></div>
                                </div>
                                <div class="spchclass form-group col-lg-4 ">
                                    <input type="text" class="form-control rounded-0 border-0 line-height-1" placeholder="<?php echo translate('WEB_LINK','Website link');?>" name="website" id="website" onchange="" value="<?php echo set_value('website'); ?>">
                                    <div class="error"><?php echo form_error('website'); ?></div>
                                </div>
                                <div class="form-group col-lg-12 t-wh">
                                  <?php echo translate('BOXES_INSTRUCTION','<h4>Please check the boxes if you answer <b><u>YES</u></b> to any of the following questions:</h4>');?>

                                    <div class="error"><?php echo form_error('features[]'); ?></div>
                                </div>
                                    <?php foreach($features as $feature): ?>
                                        <div class=" che-cls form-group col-lg-6 ">
                                            <input type="checkbox" class="mr-3 rounded-0 border-0 line-height-1" <?php echo set_checkbox("features[".$feature['fid']."]", "1"); ?> name="features[<?php echo $feature['fid']; ?>]" id="feature-<?php echo $feature['fid']; ?>" value="1">
                                            <?php echo $feature['feature_title']; ?>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <div class="form-group col-lg-12" id="amount-info">
                                  <h4><?php echo translate('YEARLY_FEES','Yearly Membership Fees');?>: <span id="invoice-amount" class="invoice-amount"></span></h4>
                                </div>
                                <div class="form-group col-lg-12 payment-option">
                                    <h4><?php echo translate('CHOSE_PAYMENT','Please chose your Preferred payment option');?>:</h4>
                                    <div class="form-group ">
                                    <select class="form-control rounded-0 border-0 line-height-1" name="payment_method" id="payment_method" required="">
                                        <option value="">--<?php echo translate('SELECT','Select');?>*--</option>
                                        <?php foreach($paymentMethods as $paymentMethod): ?>
                                        <option value="<?php echo $paymentMethod['name']; ?>" <?php echo set_select('payment_method',$paymentMethod['name']); ?> data-message="<?php echo $paymentMethod['message']; ?>"><?php echo $paymentMethod['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="error"><?php echo form_error('payment_method'); ?></div>
                                    </div>
                                    <div id="payment_message" style="display:none;"></div>
                                    <input type="text" class="form-control rounded-0 border-0 line-height-1" placeholder="<?php echo translate('PAYMENT_INFO','Payment Info');?>" name="payment_info" id="payment_info" aria-label="Payment Info" value="<?php echo set_value('payment_info'); ?>">
                                    <div id="payment_info_error" class="error"><?php echo form_error('payment_info'); ?></div>
                                </div>
                            <div class="form-group col-lg-12 text-center">
                                <input id="token" name="token" type="hidden" value="">
                                <div class="error"><?php echo form_error('token'); ?></div>
                                <input id="register-submit" type="submit" value="<?php echo translate('FINISHED_SUBMIT','Finished/Submit');?>" class="btnsubmit btn btn-quaternary btn-v-3 font-weight-semibold justify-content-center w-100 h-100 rounded-0">
                            </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
</section>
